<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property string|null $cardFinish
 * @property string|null $currency
 * @property string|null $date
 * @property string|null $gameAvailability
 * @property float|null $price
 * @property string|null $priceProvider
 * @property string|null $providerListing
 * @property string $uuid
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonPricesToday newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonPricesToday newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonPricesToday query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonPricesToday whereCardFinish($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonPricesToday whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonPricesToday whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonPricesToday whereGameAvailability($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonPricesToday wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonPricesToday wherePriceProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonPricesToday whereProviderListing($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonPricesToday whereUuid($value)
 * @mixin \Eloquent
 */
class MtgJsonPricesToday extends Model
{
    protected $connection = 'prices';

    protected $table = 'cardPrices';
}
