<?php

namespace App\Exceptions;

use Exception;

class DownloadJobException extends Exception
{
    public function __toString(): string
    {
        return __CLASS__.": [{$this->code}]: {$this->message}\n";
    }
}
