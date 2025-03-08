<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;

class DownloadJobException extends Exception
{
    public function __toString(): string
    {
        return __CLASS__.": [{$this->code}]: {$this->message}\n";
    }

    public static function cannotOpen(string $file): self
    {
        $msg = sprintf('Cannot open the file: %s', $file);

        return new self($msg);
    }

    public static function cannotDelete(string $file): self
    {
        $msg = sprintf('Cannot delete file: %s', $file);

        return new self($msg);
    }

    public static function cannotRename(string $file): self
    {
        $msg = sprintf('Cannot rename file: %s', $file);

        return new self($msg);
    }

    public static function readError(string $file): self
    {
        $msg = sprintf('Read error: %s', $file);

        return new self($msg);
    }

    public static function writeError(string $file): self
    {
        $msg = sprintf('Write error: $file', $file);

        return new self($msg);
    }
}
