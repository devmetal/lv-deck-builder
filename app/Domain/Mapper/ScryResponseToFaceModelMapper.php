<?php

namespace App\Domain\Mapper;

use App\Domain\Scry\Response\ScryCard;
use App\Models\Face;
use Illuminate\Support\Collection;

class ScryResponseToFaceModelMapper
{
    /** @return Collection<Face> */
    public function mapScryResponseToFaceModel(ScryCard $scryCard): Collection
    {
        return collect($scryCard->card_faces)->map(fn ($face) => new Face([
            'name' => $face->name,
            'cmc' => $face->cmc,
            'colors' => $face->colors,
            'oracle_text' => $face->oracle_text,
            'type_line' => $face->type_line,
        ]));
    }
}
