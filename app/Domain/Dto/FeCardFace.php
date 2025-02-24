<?php

namespace App\Domain\Dto;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class FeCardFace extends Data
{
    public int $id;

    public string $name;

    public ?FeCardImage $image;
}
