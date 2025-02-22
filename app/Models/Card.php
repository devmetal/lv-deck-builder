<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        return $this->hasMany(Price::class);
    }
}
