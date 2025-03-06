<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DownloadAllPricesTodaySqliteFile extends Command
{
    use DownloadCommand;

    private string $tempName = '__all_prices_today_temp.sqlite';

    private string $finalName = 'AllPricesToday.sqlite';

    private string $remoteUrl = 'https://mtgjson.com/api/v5/AllPricesToday.sql';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:download-all-prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download all prices from mtgjson';
}
