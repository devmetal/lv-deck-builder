<?php

namespace App\Console\Commands;

use App\Models\MtgJsonCardIdentifiers;
use App\Models\MtgJsonPricesToday;
use App\Models\Price;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ParsePrices extends Command
{
    const PROVIDER = 'cardmarket';

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
        $count = MtgJsonCardIdentifiers::whereNotNull('scryfallId')->count();

        Log::channel('command')->info('Price parsing started '.$count.' cards price will parsed');

        $bar = $this->output->createProgressBar($count);

        MtgJsonCardIdentifiers::whereNotNull('scryfallId')
            ->chunkById(500, function (Collection $ids) use (&$bar) {
                $pricesToday = $ids
                    ->map(fn ($id) => $this->getPriceTodayById($id))
                    ->filter(fn ($model) => ! is_null($model))
                    ->toArray();

                DB::transaction(function () use (&$pricesToday) {
                    foreach ($pricesToday as $priceToday) {
                        Price::where('scry_id', '=', $priceToday['scry_id'])->delete();
                        Price::insert($priceToday);
                    }
                });

                $bar->advance(500);

                Log::channel('command')->info('500 card price parsed');
            }, 'uuid');

        $bar->finish();
    }

    private function getPriceTodayById(MtgJsonCardIdentifiers $id): ?array
    {
        $priceToday = MtgJsonPricesToday::whereUuid($id->uuid)
            ->where('priceProvider', self::PROVIDER)
            ->orderBy('price', 'desc')->limit(1)->first();

        if (is_null($priceToday)) {
            return null;
        }

        return [
            'created_at' => now(),
            'updated_at' => now(),
            'scry_id' => $id->scryfallId,
            'mtgjson_uuid' => $id->uuid,
            'currency' => $priceToday->currency ?? 'Not Available',
            'provider' => $priceToday->priceProvider ?? 'Not Available',
            'price' => $priceToday->price ?? 0,
            'source_date' => $priceToday->date,
        ];
    }
}
