<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property-read \App\Models\Card|null $card
 * @property-read \App\Models\Category|null $category
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CardCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CardCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CardCategory query()
 * @mixin \Eloquent
 */
class CardCategory extends Model
{
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
