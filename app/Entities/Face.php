<?php

declare(strict_types=1);

namespace App\Entities;

use Spatie\LaravelData\Data;

class Face extends Data
{
    public function __construct(
        public readonly string $name,

        /** @var array<array-key, string>|null */
        public readonly ?array $colors,

        public readonly ?string $oracle_text,

        public readonly ?int $cmc,

        public readonly ?string $type_line,

        public readonly ?Images $images
    ) {}
}
