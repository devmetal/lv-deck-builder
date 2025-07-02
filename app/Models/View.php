<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string|null $description
 * @property int $deck_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $categories
 * @property-read int|null $categories_count
 * @property-read \App\Models\Deck $deck
 * @method static \Illuminate\Database\Eloquent\Builder<static>|View newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|View newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|View query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|View whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|View whereDeckId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|View whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|View whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|View whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|View whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class View extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    /** @return BelongsTo<Deck> */
    public function deck(): BelongsTo
    {
        return $this->belongsTo(Deck::class);
    }

    /** @return HasMany<Category> */
    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
