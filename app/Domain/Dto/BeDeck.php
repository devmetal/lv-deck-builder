<?php

declare(strict_types=1);

namespace App\Domain\Dto;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class BeDeck extends Data
{
    #[Max(128)]
    public string $name;

    #[Max(1024)]
    public ?string $note;

    #[Max(265)]
    public ?string $cover;

    public ?bool $commander = false;
}
