<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $card_id
 * @property int $category_id
 * @property int $id
 * @property-read \App\Models\Card $card
 * @property-read \App\Models\Category $category
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CardCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CardCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CardCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CardCategory whereCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CardCategory whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CardCategory whereId($value)
 * @mixin \Eloquent
 */
class CardCategory extends Model
{
    protected $table = 'card_category';

    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
