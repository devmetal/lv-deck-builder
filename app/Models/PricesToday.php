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
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PricesToday newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PricesToday newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PricesToday query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PricesToday whereCardFinish($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PricesToday whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PricesToday whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PricesToday whereGameAvailability($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PricesToday wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PricesToday wherePriceProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PricesToday whereProviderListing($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|PricesToday whereUuid($value)
 * @mixin \Eloquent
 */
class PricesToday extends Model
{
    protected $connection = 'prices';

    protected $table = 'cardPrices';
}
