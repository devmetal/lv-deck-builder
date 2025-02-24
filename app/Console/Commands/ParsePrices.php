<?php

namespace App\Console\Commands;

use App\Models\MtgJsonCardIdentifiers;
use App\Models\MtgJsonPricesToday;
use App\Models\Price;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class ParsePrices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:parse-prices';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        MtgJsonCardIdentifiers::whereNotNull('scryfallId')
            ->chunkById(500, function (Collection $ids) {

                Log::info('Job in progress');

                $ids->each(function (MtgJsonCardIdentifiers $id) {
                    $uuid = $id->uuid;
                    $scryId = $id->scryfallId;

                    $prices = MtgJsonPricesToday::where('uuid', $uuid)->get()
                        ->map(function (MtgJsonPricesToday $price) use (&$scryId, &$uuid) {
                            return [
                                'scry_id' => $scryId,
                                'mtgjson_uuid' => $uuid,
                                'currency' => $price->currency ?? 'Not Available',
                                'provider' => $price->priceProvider ?? 'Not Available',
                                'price' => $price->price ?? 0,
                                'source_date' => $price->date,
                            ];
                        })
                        ->toArray();

                    Price::insert($prices);
                });
            }, 'uuid');
    }
}
