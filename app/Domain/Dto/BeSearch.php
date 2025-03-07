<?php

namespace App\Domain\Dto;

use Spatie\LaravelData\Attributes\Validation\Enum;
use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Numeric;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class BeSearch extends Data
{
    #[Max(128)]
    public ?string $term;

    #[Numeric]
    #[Max(9999)]
    public ?string $setId;

    #[Enum(Rarity::class)]
    public ?string $rarity;

    /** @var ?array<string> */
    #[Max(5), In(['W', 'B', 'G', 'U', 'C', 'R'])]
    public ?array $colors;
}
