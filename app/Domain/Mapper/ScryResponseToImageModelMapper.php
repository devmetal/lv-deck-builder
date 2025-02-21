<?php

namespace App\Domain\Mapper;

use App\Domain\Scry\Response\ScryCard;
use App\Models\Image;

class ScryResponseToImageModelMapper
{
    public function mapScryImageToImageModel(ScryCard $scryCard): Image
    {
        $image = $scryCard->image_uris;

        return new Image([
            'png' => $image->png,
            'art' => $image->art_crop,
            'large' => $image->large,
            'normal' => $image->normal,
            'small' => $image->small,
        ]);
    }
}
