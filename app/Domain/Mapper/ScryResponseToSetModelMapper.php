<?php

namespace App\Domain\Mapper;

use App\Domain\Scry\Response\ScryCard;
use App\Models\Set;

class ScryResponseToSetModelMapper
{
    public function mapScryResponseToSetModel(ScryCard $scryCard): Set
    {
        return new Set([
            'name' => $scryCard->set_name,
            'set_id' => $scryCard->set_id,
        ]);
    }
}
