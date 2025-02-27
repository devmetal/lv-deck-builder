<?php

namespace App\Jobs;

use App\Domain\Mapper\ScryResponseToCardModelMapper;
use App\Domain\Scry\ScryRepository;
use App\Models\Face;
use App\Models\Image;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\DB;

class ProcessImportedCard implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $externalCardId,
        public User $user,
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(
        ScryRepository $repository,
        ScryResponseToCardModelMapper $cardMapper
    ): void {
        // read raw card data from repository
        $scryCard = $repository->getCardByScryId($this->externalCardId);

        // map card data to model
        $cardModel = $cardMapper->mapScryCardToCardModel($scryCard);

        DB::transaction(function () use (&$cardModel, &$scryCard) {
            $set = $this->user->sets()->firstOrCreate(
                ['set_id' => $scryCard->set_id],
                ['name' => $scryCard->set_name]
            );

            $cardModel->user()->associate($this->user);

            $cardModel->set()->associate($set);

            $cardModel->save();

            // when response has images
            if (is_null($scryCard->image_uris) == false) {
                $cardModel->image()->firstOrCreate(
                    ['png' => $scryCard->image_uris->png],
                    [
                        'art' => $scryCard->image_uris->art_crop,
                        'large' => $scryCard->image_uris->large,
                        'normal' => $scryCard->image_uris->normal,
                        'small' => $scryCard->image_uris->small,
                    ]
                );

                $cardModel->save();
            }

            // when response has faces
            if (! is_null($scryCard->card_faces)) {

                foreach ($scryCard->card_faces as $face) {
                    $faceModel = new Face([
                        'name' => $face->name,
                        'cmc' => $face->cmc,
                        'colors' => $face->colors,
                        'oracle_text' => $face->oracle_text,
                        'type_line' => $face->type_line,
                    ]);

                    if (! is_null($face->image_uris)) {
                        $images = Image::firstOrCreate(
                            ['png' => $face->image_uris->png],
                            [
                                'art' => $face->image_uris->art_crop,
                                'large' => $face->image_uris->large,
                                'normal' => $face->image_uris->normal,
                                'small' => $face->image_uris->small,
                            ]
                        );

                        $faceModel->image()->associate($images);
                    }

                    $faceModel->card()->associate($cardModel);

                    $faceModel->save();
                }
            }
        });
    }
}
