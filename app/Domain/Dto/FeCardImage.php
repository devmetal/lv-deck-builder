<?php

namespace App\Domain\Dto;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class FeCardImage extends Data
{
    public string $png;

    public string $small;

    public string $large;
}
