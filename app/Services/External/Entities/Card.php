<?php

declare(strict_types=1);

namespace App\Services\External\Entities;

use Spatie\LaravelData\Data;

class Card extends Data
{
    public function __construct(
        public readonly string $name,

        /** @var array<array-key, string>|null */
        public readonly ?array $colors,

        /** @var array<array-key, string>|null */
        public readonly ?array $keywords,

        public readonly ?string $oracle_text,

        public readonly int $cmc,

        public readonly string $type_line,

        /** @var array<Face>|null */
        public readonly ?array $faces,

        public readonly ?Images $images,

        public readonly string $set_id,

        public readonly string $set_name,

        public readonly string $scry_id,

        public readonly string $rarity,
    ) {}
}
