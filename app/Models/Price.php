<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $mtgjson_uuid
 * @property string $provider
 * @property string $currency
 * @property float $price
 * @property string $scry_id
 * @property string $source_date
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Price newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Price newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Price query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Price whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Price whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Price whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Price whereMtgjsonUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Price wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Price whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Price whereScryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Price whereSourceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Price whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Price extends Model
{
    protected $fillable = [
        'mtgjson_uuid',
        'provider',
        'currency',
        'price',
        'scry_id',
        'source_date',
    ];
}
