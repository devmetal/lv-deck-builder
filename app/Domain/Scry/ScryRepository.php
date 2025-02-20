<?php

namespace App\Domain\Scry;

use App\Domain\Scry\Response\ScryCard;
use Illuminate\Support\Facades\Http;

class ScryRepository
{
    private const SCRY_BASE_URI = 'https://api.scryfall.com/cards/';

    public function getCardByScryId(string $id): ?ScryCard
    {
        $response = Http::get(self::SCRY_BASE_URI.$id);

        if (! $response->ok()) {
            return null;
        }

        $body = $response->json();

        return ScryCard::validateAndCreate($body);
    }
}
