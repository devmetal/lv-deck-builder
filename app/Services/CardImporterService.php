<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Card as CardModel;
use App\Models\Face as FaceModel;
use App\Models\Image as ImageModel;
use App\Models\User;
use App\Services\External\Entities\Card as CardEntity;
use App\Services\External\Entities\Face as FaceEntity;
use App\Services\External\Entities\Images as ImagesEntity;
use App\Services\External\ExternalCardReader;
use Illuminate\Support\Facades\DB;

class CardImporterService
{
    public function __construct(
        private readonly ExternalCardReader $reader
    ) {}

    public function importExternalCardToUser(string $extId, int $userId): void
    {
        $entity = $this->reader->readExternalCard($extId);

        DB::transaction(function () use (&$entity, &$userId) {
            $cardModel = $this->createCard($entity);

            $userModel = User::find($userId);

            $setModel = $userModel->sets()->firstOrCreate(
                ['set_id' => $entity->set_id],
                ['name' => $entity->set_name]
            );

            $cardModel->user()->associate($userModel);

            $cardModel->set()->associate($setModel);

            $cardModel->save();

            if (! is_null($entity->images)) {
                $imagesModel = $this->getOrCreateImage($entity->images);
                $cardModel->image()->associate($imagesModel);
            }

            if (! is_null($entity->faces)) {
                collect($entity->faces)
                    ->map(fn ($face) => $this->createFace($face))
                    ->each(function ($face) use (&$cardModel) {
                        $face->card()->associate($cardModel);
                        $face->save();
                    });

            }

            $cardModel->save();
        });
    }

    private function createCard(CardEntity $entity): CardModel
    {
        return new CardModel([
            'name' => $entity->name,
            'scry_id' => $entity->scry_id,
            'colors' => $entity->colors,
            'keywords' => $entity->keywords,
            'oracle_text' => $entity->oracle_text,
            'cmc' => $entity->cmc,
            'type_line' => $entity->type_line,
        ]);
    }

    private function getOrCreateImage(ImagesEntity $images): ImageModel
    {
        return ImageModel::firstOrCreate(
            ['png' => $images->png],
            [
                'art' => $images->art,
                'large' => $images->large,
                'normal' => $images->normal,
                'small' => $images->small,
            ]
        );
    }

    private function createFace(FaceEntity $face): FaceModel
    {
        $faceModel = new FaceModel([
            'name' => $face->name,
            'cmc' => $face->cmc,
            'colors' => $face->colors,
            'oracle_text' => $face->oracle_text,
            'type_line' => $face->type_line,
        ]);

        if (! is_null($face->images)) {
            $images = $this->getOrCreateImage($face->images);
            $faceModel->image()->associate($images);
        }

        return $faceModel;
    }
}
