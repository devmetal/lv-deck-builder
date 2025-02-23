<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DownloadMtgJsonDatabases extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:download-mtg-json-databases';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download price datas';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $path = database_path('AllPricesToday.sqlite');
        $prices = 'https://mtgjson.com/api/v5/AllPricesToday.sql';
        file_put_contents($path, fopen($prices, 'r'));
    }
}
