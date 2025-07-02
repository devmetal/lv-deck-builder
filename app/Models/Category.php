<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property int $view_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Card> $cards
 * @property-read int|null $cards_count
 * @property-read \App\Models\View $view
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Category whereViewId($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    protected $fillable = [
        'name',
    ];

    /** @return BelongsTo<View> */
    public function view(): BelongsTo
    {
        return $this->belongsTo(View::class);
    }

    /** @return BelongsToMany<Card> */
    public function cards(): BelongsToMany
    {
        return $this->belongsToMany(Card::class, 'card_category', 'category_id', 'card_id');
    }
}
