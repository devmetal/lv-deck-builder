<?php

declare(strict_types=1);

namespace App\Domain\Dto;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class FeCardPaginationLink extends Data
{
    public function __construct(
        public readonly ?string $url,
        public readonly string $label,
        public readonly bool $active
    ) {}
}
