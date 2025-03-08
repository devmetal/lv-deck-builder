<?php

declare(strict_types=1);

namespace App\Services\External;

use App\Exceptions\DownloadJobException;
use Closure;

class DownloadSqliteFileService
{
    private ?Closure $onStartedHandler;

    private ?Closure $onProgressHandler;

    private ?Closure $onFinishedHandler;

    public function onStart(Closure $closure): self
    {
        $this->onStartedHandler = $closure;

        return $this;
    }

    public function onProgress(Closure $closure): self
    {
        $this->onProgressHandler = $closure;

        return $this;
    }

    public function onFinish(Closure $closure): self
    {
        $this->onFinishedHandler = $closure;

        return $this;
    }

    /**
     * Download a file from remote
     * Using temp file to store datas
     * Replaces at the end
     *
     * @throws DownloadJobException
     */
    public function download(
        string $tempName,
        string $finalName,
        string $remoteUrl
    ): void {
        $this->started();

        // open a socket for the server get download start
        $remoteFile = fopen($remoteUrl, 'rb');
        $remoteSize = $this->curlGetFileSize($remoteUrl);

        if ($remoteFile === false) {
            throw DownloadJobException::cannotOpen($remoteUrl);
        }

        // open a local file for store the binary data
        $localPath = database_path($tempName);
        $localFile = fopen($localPath, 'wb');

        if ($localFile === false) {
            throw DownloadJobException::cannotOpen($localPath);
        }

        $chunkSize = 8192; // 8kb
        $bytesReaded = 0;
        $chunksReaded = 0;
        $logInEvery = 100;

        // reading and writing the data, keep the memory footprint low
        while (! feof($remoteFile)) {
            $content = fread($remoteFile, $chunkSize);

            if ($content === false) {
                fclose($remoteFile);
                fclose($localFile);

                throw DownloadJobException::readError($remoteUrl);
            }

            if (fwrite($localFile, $content) === false) {
                fclose($remoteFile);
                fclose($localFile);

                throw DownloadJobException::writeError($localPath);
            }

            $bytesReaded += $chunkSize;
            if ($chunksReaded++ % $logInEvery === 0) {
                $this->progress($bytesReaded, $remoteSize);
            }
        }

        // when the reading is done we close both connections
        fclose($remoteFile);
        fclose($localFile);

        // delete the old file and replace it with a new one
        $targetPath = database_path($finalName);
        if (file_exists($targetPath) && unlink($targetPath) === false) {
            throw DownloadJobException::cannotDelete($localPath);
        }

        if (rename($localPath, $targetPath) === false) {
            throw DownloadJobException::cannotRename($localPath);
        }

        $this->finished();
    }

    /**
     * Returns the size of a file without downloading it, or -1 if the file
     * size could not be determined.
     *
     * @param  $url  - The location of the remote file to download. Cannot
     *              be null or empty.
     * @return int
     *             The size of the file referenced by $url, or -1 if the size
     *             could not be determined.
     */
    private function curlGetFileSize($url): int
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_NOBODY, true);

        $data = curl_exec($ch);
        $size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);

        curl_close($ch);

        return $size;
    }

    private function started(): void
    {
        $handler = $this->onStartedHandler;
        if (! is_null($handler)) {
            $handler();
        }
    }

    private function finished(): void
    {
        $handler = $this->onFinishedHandler;
        if (! is_null($handler)) {
            $handler();
        }
    }

    private function progress(int $bytesReaded, int $fileSize): void
    {
        $handler = $this->onProgressHandler;
        if (! is_null($handler)) {
            $handler($bytesReaded, $fileSize);
        }
    }
}
