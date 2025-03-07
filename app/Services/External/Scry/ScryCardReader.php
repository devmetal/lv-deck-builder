<?php

declare(strict_types=1);

namespace App\Services\External\Scry;

use App\Services\External\Entities\Card;
use App\Services\External\ExternalCardReader;
use App\Services\External\Scry\Dto\ScryCard;
use Illuminate\Support\Facades\Http;

class ScryCardReader implements ExternalCardReader
{
    private const SCRY_CARDS_BASE_URI = 'https://api.scryfall.com/cards/';

    public function getScryCardFromApi(string $id): ?ScryCard
    {
        $response = Http::get(self::SCRY_CARDS_BASE_URI.$id);

        if (! $response->ok()) {
            return null;
        }

        // should return card entity
        return ScryCard::validateAndCreate($response->json());
    }

    public function readExternalCard(mixed $identifier): Card
    {
        $dto = $this->getScryCardFromApi($identifier);

        return Card::validateAndCreate([
            'name' => $dto->name,
            'colors' => $dto->color_identity,
            'keywords' => $dto->keywords,
            'oracle_text' => $dto->oracle_text,
            'cmc' => $dto->cmc,
            'type_line' => $dto->type_line,
            'set_id' => $dto->set_id,
            'set_name' => $dto->set_name,
            'scry_id' => $dto->id,
            'rarity' => $dto->rarity->value,
            'images' => ! is_null($dto->image_uris) ? [
                'png' => $dto->image_uris->png,
                'art' => $dto->image_uris->art_crop,
                'large' => $dto->image_uris->large,
                'normal' => $dto->image_uris->normal,
                'small' => $dto->image_uris->small,
            ] : null,
            'faces' => collect($dto->card_faces)
                ->map(fn ($face) => [
                    'name' => $face->name,
                    'colors' => $face->colors,
                    'oracle_text' => $face->oracle_text,
                    'cmc' => $face->cmc,
                    'type_line' => $face->type_line,
                    'images' => ! is_null($face->image_uris) ? [
                        'png' => $face->image_uris->png,
                        'art' => $face->image_uris->art_crop,
                        'large' => $face->image_uris->large,
                        'normal' => $face->image_uris->normal,
                        'small' => $face->image_uris->small,
                    ] : null,
                ])
                ->toArray(),
        ]);
    }
}
