<?php

declare(strict_types=1);

namespace App\Domain\Dto;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class FeCardPagination extends Data
{
    public function __construct(
        public readonly int $current_page,

        public readonly int $last_page,

        public readonly string $first_page_url,

        public readonly string $last_page_url,

        public readonly ?string $next_page_url,

        public readonly ?string $prev_page_url,

        /** @var array<FeCardPaginationLink> */
        public readonly array $links,

        /** @var array<FeCard> */
        public readonly array $data,
    ) {}
}
