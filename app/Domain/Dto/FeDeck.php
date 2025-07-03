<?php

declare(strict_types=1);

namespace App\Domain\Dto;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class FeDeck extends Data
{
    public function __construct(
        public readonly int $id,

        public readonly string $name,

        public readonly ?string $note,

        public readonly ?string $cover,

        public readonly bool $commander,
    ) {}
}
