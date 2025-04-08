<?php

declare(strict_types=1);

namespace App\Domain\Dto;

use Spatie\LaravelData\Attributes\Validation\AlphaNumeric;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class BeDeck extends Data
{
    #[Max(128), AlphaNumeric]
    public string $name;

    public ?string $note;

    public ?string $cover;

    public ?bool $commander = false;
}
