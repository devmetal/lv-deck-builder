<?php

declare(strict_types=1);

namespace App\Domain\Dto;

use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class FeDeckCard extends FeCard
{
    public FeDeckCardPivot $pivot;
}
