<?php

namespace App\Domain\Dto;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class FeCardImage extends Data
{
    public function __construct(
        public readonly string $png,

        public readonly string $small,

        public readonly string $large,
    ) {}
}
