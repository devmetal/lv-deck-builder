<?php

declare(strict_types=1);

namespace App\Services\External;

use App\Entities\Card;

interface ExternalCardReader
{
    public function readExternalCard(mixed $identifier): Card;
}
