<?php

declare(strict_types=1);

namespace App\Domain\Dto;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class FeDeck extends Data
{
    public int $id;

    public string $name;

    public ?string $note;

    public ?string $cover;

    public bool $commander;
}
