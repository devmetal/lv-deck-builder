<?php

namespace App\Jobs;

use App\Domain\Mapper\ScryResponseToCardModelMapper;
use App\Domain\Mapper\ScryResponseToImageModelMapper;
use App\Domain\Scry\ScryRepository;
use App\Models\Image;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ProcessImportedCard implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(
        public string $cardIdOnScryApi,
        public User $user,
    ) {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(
        ScryRepository $repository,
        ScryResponseToCardModelMapper $cardMapper,
        ScryResponseToImageModelMapper $imageMapper
    ): void {
        // read raw card data from repository
        $scryCard = $repository->getCardByScryId($this->cardIdOnScryApi);

        // map card data to model
        $cardModel = $cardMapper->mapScryCardToCardModel($scryCard);

        // try to find an existing images record
        $imagesRecordInDb = Image::where('png', $scryCard->image_uris->png)
            ->first();

        if (! $imagesRecordInDb) {
            $imagesRecordInDb = $imageMapper
                ->mapScryImageToImageModel($scryCard->image_uris)
                ->save();
        }

        // create the relation and store the image with card
        $cardModel->image()->associate($imagesRecordInDb);
        $cardModel->user()->associate($this->user);
        $cardModel->save();
    }
}
