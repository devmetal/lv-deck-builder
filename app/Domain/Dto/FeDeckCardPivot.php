<?php

declare(strict_types=1);

namespace App\Domain\Dto;

use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class FeDeckCardPivot extends Data
{
    public int $column;

    public int $row;
}
