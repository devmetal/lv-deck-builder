<?php

declare(strict_types=1);

namespace App\Domain\Dto;

use Spatie\TypeScriptTransformer\Attributes\TypeScript;

#[TypeScript]
class FeDeckCards extends FeDeck
{
    /**
     * @var array<FeCard>
     */
    public array $cards = [];
}
