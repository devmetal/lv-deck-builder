<?php

namespace App\Domain\Dto;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class FeCardFace extends Data
{
    public function __construct(
        public readonly int $id,

        public readonly string $name,

        public readonly ?FeCardImage $image,
    ) {}
}
