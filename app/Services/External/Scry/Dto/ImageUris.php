<?php

declare(strict_types=1);

namespace App\Services\External\Scry\Dto;

use Spatie\LaravelData\Data;

class ImageUris extends Data
{
    public function __construct(
        public string $png,
        public string $border_crop,
        public string $art_crop,
        public string $large,
        public string $normal,
        public string $small
    ) {}
}
