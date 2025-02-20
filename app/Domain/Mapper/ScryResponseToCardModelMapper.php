<?php

namespace App\Domain\Mapper;

use App\Domain\Scry\Response\ScryCard;
use App\Models\Card;

class ScryResponseToCardModelMapper
{
    public function mapScryCardToCardModel(ScryCard $scryCard): Card
    {
        return new Card([
            'name' => $scryCard->name,
            'scry_id' => $scryCard->id,
            'scry_data' => $scryCard,
            'colors' => $scryCard->colors,
            'keywords' => $scryCard->keywords,
            'oracle_text' => $scryCard->oracle_text,
            'cmc' => $scryCard->cmc,
            'type_line' => $scryCard->type_line,
        ]);
    }
}
