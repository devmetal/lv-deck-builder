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
 * @property string|null $note
 * @property string|null $cover
 * @property bool $commander
 * @property int $user_id
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\View> $views
 * @property-read int|null $views_count
 * @method static \Database\Factories\DeckFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deck newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deck newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deck query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deck whereCommander($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deck whereCover($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deck whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deck whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deck whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deck whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deck whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Deck whereUserId($value)
 * @mixin \Eloquent
 */
class Deck extends Model
{
    /** @use HasFactory<\Database\Factories\DeckFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'note',
        'cover',
        'commander',
    ];

    /** @return BelongsTo<User> */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** @return HasMany<View> */
    public function views(): HasMany
    {
        return $this->hasMany(View::class);
    }
}
