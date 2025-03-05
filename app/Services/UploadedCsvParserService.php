<?php

namespace App\Services;

use App\Exceptions\CsvRequestException;
use Illuminate\Support\Collection;

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
            throw new CsvRequestException('Csv file has to be a header');
        }

        $header = collect(str_getcsv(array_shift($lines), ',', '"', '\\'));

        $scryIdKey = $header->contains('scry_id') ? 'scry_id' : ($header->contains('Scryfall ID') ? 'Scryfall ID' : null);

        if (is_null($scryIdKey)) {
            throw new CsvRequestException('Missing scry id header');
        }

        return collect($lines)
            ->map(fn ($row) => $header->combine(str_getcsv($row, ',', '"', '\\')))
            ->map(fn ($row) => $row[$scryIdKey]);
    }
}
