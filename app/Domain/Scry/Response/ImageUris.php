<?php

namespace App\Domain\Scry\Response;

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
