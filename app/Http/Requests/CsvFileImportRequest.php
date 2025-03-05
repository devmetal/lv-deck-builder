<?php

namespace App\Http\Requests;

use App\Exceptions\CsvRequestException;
use App\Services\UploadedCsvParserService;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\ValidationException;

class CsvFileImportRequest extends FormRequest
{
    public function __construct(
        private UploadedCsvParserService $csvParser
    ) {}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'file' => ['required', File::types('text/csv')->max(12 * 1024)],
        ];
    }

    /**
     * @throws FileNotFoundException
     * @throws ValidationException
     */
    public function getScryIdsFromFile(): Collection
    {
        $csv = $this->file('file')->get();

        try {
            return $this->csvParser->getScryIds($csv);
        } catch (CsvRequestException $ex) {
            throw ValidationException::withMessages([
                'file' => $ex->getMessage(),
            ]);
        }
    }
}
