<?php

namespace App\Domain\Mapper;

use App\Domain\Scry\Response\ImageUris;
use App\Models\Image;

class ScryResponseToImageModelMapper
{
    public function mapScryImageToImageModel(ImageUris $image): Image
    {
        return new Image([
            'png' => $image->png,
            'art' => $image->art_crop,
            'large' => $image->large,
            'normal' => $image->normal,
            'small' => $image->small,
        ]);
    }
}
