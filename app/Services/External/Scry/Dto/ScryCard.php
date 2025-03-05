<?php

declare(strict_types=1);

namespace App\Services\External\Scry\Dto;

use Spatie\LaravelData\Attributes\Validation\Present;
use Spatie\LaravelData\Data;

enum Legality: string
{
    case legal = 'legal';
    case not_legal = 'not_legal';
    case restricted = 'restricted';
    case banned = 'banned';
};

enum ImageStatus: string
{
    case missing = 'missing';
    case placeholder = 'placeholder';
    case lowres = 'lowres';
    case highres_scan = 'highres_scan';
};

enum Rarity: string
{
    case common = 'common';
    case uncommon = 'uncommon';
    case rare = 'rare';
    case special = 'special';
    case mythic = 'mythic';
    case bonus = 'bonus';
};

enum SecurityStamp: string
{
    case oval = 'oval';
    case triangle = 'triangle';
    case acron = 'acron';
    case circle = 'circle';
    case arena = 'arena';
    case heart = 'heart';
};

class ScryCard extends Data
{
    public ?int $arena_id;

    public string $id;

    public string $lang;

    public ?int $mtgo_id;

    public ?int $mtgo_foil_id;

    /**
     * @var array<int>|null
     */
    public ?array $multiverse_ids;

    public ?int $tcgplayer_id;

    public ?int $tcgplayer_etched_id;

    public ?int $cardmarket_id;

    public string $object;

    public string $layout;

    public ?string $oracle_id;

    public string $prints_search_uri;

    public string $rulings_uri;

    public string $scryfall_uri;

    public string $uri;

    /** @var array<RelatedCard>|null */
    public ?array $all_parts;

    /** @var array<CardFace>|null */
    public ?array $card_faces;

    public float $cmc;

    /** @var array<string> */
    #[Present]
    public array $color_identity;

    /** @var array<string>|null */
    public ?array $color_indicator;

    /** @var array<string>|null */
    public ?array $colors;

    public ?string $defense;

    public ?int $edhrec_rank;

    public ?string $hand_modifier;

    /** @var array<string> */
    #[Present]
    public array $keywords;

    /** @var array<string, Legality> */
    public array $legalities;

    public ?string $life_modifier;

    public ?string $loyalty;

    public ?string $mana_cost;

    public string $name;

    public ?string $oracle_text;

    public ?int $penny_rank;

    public ?string $power;

    /** @var array<string>|null */
    public ?array $produced_mana;

    public bool $reserved;

    public ?string $toughness;

    public string $type_line;

    public ?string $artist;

    /** @var array<string>|null */
    public ?array $artist_ids;

    /** @var array<string>|null */
    public ?array $attraction_lights;

    public bool $booster;

    public string $border_color;

    public ?string $card_back_id;

    public string $collector_number;

    public ?bool $content_warning;

    public bool $digital;

    /** @var array<string> */
    public array $finishes;

    public ?string $flavor_name;

    public ?string $flavor_text;

    /** @var array<string>|null */
    public ?array $frame_effects;

    public string $frame;

    public bool $full_art;

    /** @var array<string> */
    public array $games;

    public bool $highres_image;

    public ?string $illustration_id;

    public ImageStatus $image_status;

    public ?ImageUris $image_uris;

    public bool $oversized;

    /** @var array<string, string|null> */
    public array $prices;

    public ?string $printed_name;

    public ?string $printed_text;

    public ?string $printed_type_line;

    public bool $promo;

    /** @var array<string>|null */
    public ?array $promo_types;

    /** @var array<string, string>|null */
    public ?array $purchase_uris;

    public Rarity $rarity;

    /** @var array<string, string> */
    public array $related_uris;

    public string $released_at;

    public bool $reprint;

    public string $scryfall_set_uri;

    public string $set_name;

    public string $set_search_uri;

    public string $set_type;

    public string $set_uri;

    public string $set;

    public string $set_id;

    public bool $story_spotlight;

    public bool $textless;

    public bool $variation;

    public ?string $variation_of;

    public ?SecurityStamp $security_stamp;

    public ?string $watermark;

    public ?bool $foil;

    public ?bool $nonfoil;

    /** @var array<string, string> */
    public ?array $preview;
}
