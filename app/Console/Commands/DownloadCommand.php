<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Services\External\DownloadSqliteFileService;
use Illuminate\Support\Facades\Log;
use Throwable;

trait DownloadCommand
{
    /**
     * Execute the console command.
     */
    public function handle(DownloadSqliteFileService $downloader)
    {
        $bar = $this->output->createProgressBar(100);

        $downloader
            ->onStart(function () use (&$bar) {
                Log::channel('command')->info('Download started');
                $bar->start();
            })
            ->onFinish(function () use (&$bar) {
                Log::channel('command')->info(implode(',', [
                    $this->remoteUrl.' ===> '.$this->finalName,
                    'Job finished',
                ]));
                $bar->finish();
            })
            ->onProgress(function (int $readed, int $size) use (&$bar) {
                $percent = intval(floor(($readed / $size) * 100));

                Log::channel('command')->info(implode(', ', [
                    floor($readed / 1024 / 1024).'MB',
                    $this->remoteUrl.' ===> '.$this->finalName,
                    $percent.'%',
                ]));

                $bar->setProgress($percent);
            });

        try {
            $downloader
                ->download(
                    $this->tempName,
                    $this->finalName,
                    $this->remoteUrl
                );
        } catch (Throwable $err) {
            $this->error('Command failed');

            Log::channel('command')->error('Job failed');

            Log::channel('command')->error($err);

            $bar->finish();

            return 1;
        }
    }
}
