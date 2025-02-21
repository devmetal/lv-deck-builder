<?php

namespace App\Http\Requests;

use App\Facades\UploadedCsvParserFacade;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class CsvFileImportRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'file' => ['required', File::types('text/csv')->max(12 * 1024)],
        ];
    }

    public function getScryIdsFromFile()
    {
        $csv = $this->file('file')->get();

        return UploadedCsvParserFacade::getScryIds($csv);
    }
}
