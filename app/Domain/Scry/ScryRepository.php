<?php

namespace App\Domain\Scry;

use App\Domain\Scry\Response\Card;
use Illuminate\Support\Facades\Http;

class ScryRepository
{
    private const SCRY_BASE_URI = 'https://api.scryfall.com/cards/';

    public function getCardByScryId(string $id): ?Card
    {
        $response = Http::get(self::SCRY_BASE_URI.$id);

        if (! $response->ok()) {
            return null;
        }

        $body = $response->json();

        return Card::validateAndCreate($body);
    }
}
