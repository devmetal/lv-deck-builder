<?php

declare(strict_types=1);

namespace App\Services\External\Scry\Dto;

use Spatie\LaravelData\Data;

class CardFace extends Data
{
    public string $object;

    public string $name;

    public ?string $artist;

    public ?string $artist_id;

    public ?int $cmc;

    /** @var array<string>|null */
    public ?array $color_indicator;

    /** @var array<string>|null */
    public ?array $colors;

    public ?string $defense;

    public ?string $flavor_text;

    public ?string $illustration_id;

    public ?ImageUris $image_uris;

    public ?string $layout;

    public ?string $loyalty;

    public ?string $mana_cost;

    public ?string $oracle_id;

    public ?string $oracle_text;

    public ?string $power;

    public ?string $printed_name;

    public ?string $printed_text;

    public ?string $printed_type_line;

    public ?string $toughness;

    public ?string $type_line;

    public ?string $watermark;
}
