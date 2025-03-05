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
            'colors' => $scryCard->color_identity,
            'keywords' => $scryCard->keywords,
            'oracle_text' => $scryCard->oracle_text,
            'cmc' => $scryCard->cmc,
            'type_line' => $scryCard->type_line,
            'set_id' => $scryCard->set_id,
        ]);
    }
}
