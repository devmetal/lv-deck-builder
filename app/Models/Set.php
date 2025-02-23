<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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
 * @property string $set_id
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Card> $cards
 * @property-read int|null $cards_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\SetFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Set newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Set newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Set query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Set whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Set whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Set whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Set whereSetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Set whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Set whereUserId($value)
 * @mixin \Eloquent
 */
class Set extends Model
{
    /** @use HasFactory<\Database\Factories\SetFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'set_id',
    ];

    /** @return BelongsTo<User> */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** @return HasMany<Card> */
    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }
}
