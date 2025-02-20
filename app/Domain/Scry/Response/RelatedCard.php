<?php

namespace App\Domain\Scry\Response;

use Spatie\LaravelData\Data;

enum Component: string
{
    case token = 'token';
    case meld_part = 'meld_part';
    case meld_result = 'meld_result';
    case combo_piece = 'combo_piece';
}

class RelatedCard extends Data
{
    public function __construct(
        public string $id,
        public string $object,
        public Component $component,
        public string $name,
        public string $type_line,
        public string $uri
    ) {}
}
