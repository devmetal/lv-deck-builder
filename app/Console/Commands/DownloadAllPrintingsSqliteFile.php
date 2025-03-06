<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DownloadAllPrintingsSqliteFile extends Command
{
    use DownloadCommand;

    private string $tempName = '__all_printings_temp.sqlite';

    private string $finalName = 'AllPrintings.sqlite';

    private string $remoteUrl = 'https://mtgjson.com/api/v5/AllPrintings.sqlite';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:download-all-printings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download all printings from mtgjson';
}
