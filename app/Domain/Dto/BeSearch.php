<?php

namespace App\Domain\Dto;

use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class BeSearch extends Data
{
    public ?string $term;

    public ?string $setId;

    public ?string $rarity;

    /** @var ?array<string> */
    #[In(['W', 'B', 'G', 'U', 'C', 'R'])]
    public ?array $colors;
}
