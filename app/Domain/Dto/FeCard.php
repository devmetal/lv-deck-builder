<?php

namespace App\Domain\Dto;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class FeCard extends Data
{
    public function __construct(
        public readonly int $id,

        public readonly ?FeCardImage $image,

        #[MapInputName('max_price')]
        public readonly ?float $price,

        /** @var array<FeCardFace> */
        public readonly ?array $faces,

        public readonly string $name,

        /** @var ?array<string> */
        #[In(['W', 'B', 'G', 'U', 'C', 'R'])]
        public readonly ?array $colors,
    ) {}
}
