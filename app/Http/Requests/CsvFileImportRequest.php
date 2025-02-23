<?php

namespace App\Http\Requests;

use App\Facades\UploadedCsvParserFacade;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rules\File;

class CsvFileImportRequest extends FormRequest
{
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
     */
    public function getScryIdsFromFile(): Collection
    {
        $csv = $this->file('file')->get();

        return UploadedCsvParserFacade::getScryIds($csv);
    }
}
