<?php

namespace App\Domain\Dto;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\Validation\In;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class FeCard extends Data
{
    public int $id;

    public ?FeCardImage $image;

    #[MapInputName('max_price')]
    public ?float $price;

    /**
     * @var array<FeCardFace>
     */
    public ?array $faces;

    public string $name;

    /** @var ?array<string> */
    #[In(['W', 'B', 'G', 'U', 'C', 'R'])]
    public ?array $colors;
}
