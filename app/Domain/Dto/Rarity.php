<?php

declare(strict_types=1);

namespace App\Domain\Dto;

enum Rarity: string
{
    case common = 'common';
    case uncommon = 'uncommon';
    case rare = 'rare';
    case special = 'special';
    case mythic = 'mythic';
    case bonus = 'bonus';
};
