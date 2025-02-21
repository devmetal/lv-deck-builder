<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;

class UploadedCsvParserService
{
    /**
     * @return Collection<string> Collection of scry ids parsed from csv
     *
     * @throws Illuminate\Validation\ValidationException
     */
    public function getScryIds(string $csv): Collection
    {
        $lines = array_filter(
            explode(PHP_EOL, $csv),
            fn ($line) => strlen($line) > 0
        );

        if (count($lines) <= 1) {
            throw ValidationException::withMessages([
                'file' => ['Csv file has to be a header'],
            ]);
        }

        $header = collect(str_getcsv(array_shift($lines)));

        if (! $header->contains('scry_id')) {
            throw ValidationException::withMessages([
                'file' => ['Missing scry_id header'],
            ]);
        }

        return collect($lines)
            ->map(fn ($row) => $header->combine(str_getcsv($row)))
            ->map(fn ($row) => $row['scry_id']);
    }
}
