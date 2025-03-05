<?php

declare(strict_types=1);

namespace App\Services\External\Entities;

use Spatie\LaravelData\Data;

class Images extends Data
{
    public function __construct(
        public readonly string $png,
        public readonly string $art,
        public readonly string $large,
        public readonly string $normal,
        public readonly string $small
    ) {}
}
