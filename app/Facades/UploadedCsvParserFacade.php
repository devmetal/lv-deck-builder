<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static Collection<string> getScryIds(string $csv)
 *
 * @see \App\Services\UploadedCsvParserService
 */
class UploadedCsvParserFacade extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \App\Services\UploadedCsvParserService::class;
    }
}
