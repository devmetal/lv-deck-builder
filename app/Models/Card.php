<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $scry_id
 * @property array<array-key, mixed>|null $colors
 * @property array<array-key, mixed>|null $keywords
 * @property string|null $oracle_text
 * @property int $cmc
 * @property string $type_line
 * @property int $user_id
 * @property int $set_id
 * @property int|null $image_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Deck> $decks
 * @property-read int|null $decks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Face> $faces
 * @property-read int|null $faces_count
 * @property-read \App\Models\Image|null $image
 * @property-read \App\Models\Set $set
 * @property-read \App\Models\User $user
 *
 * @method static \Database\Factories\CardFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereCmc($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereColors($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereOracleText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereScryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereSetId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereTypeLine($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Card whereUserId($value)
 *
 * @mixin \Eloquent
 */
class Card extends Model
{
    /** @use HasFactory<\Database\Factories\CardFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'scry_id',
        'colors',
        'keywords',
        'oracle_text',
        'cmc',
        'type_line',
        'set_id',
    ];

    protected $casts = [
        'colors' => 'json',
        'keywords' => 'json',
    ];

    protected $hidden = [
        'user_id',
    ];

    /** @return BelongsTo<User> */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** @return BelongsTo<Image> */
    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    /** @return BelongsToMany<Deck> */
    public function decks(): BelongsToMany
    {
        return $this->belongsToMany(Deck::class);
    }

    /** @return BelongsTo<Set> */
    public function set(): BelongsTo
    {
        return $this->belongsTo(Set::class);
    }

    /** @return HasMany<Face> */
    public function faces(): HasMany
    {
        return $this->hasMany(Face::class);
    }

    /** @return HasMany<Price> */
    public function prices(): HasMany
    {
        return $this->hasMany(Price::class, 'scry_id', 'scry_id');
    }
}
