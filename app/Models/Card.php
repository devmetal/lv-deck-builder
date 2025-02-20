<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Card extends Model
{
    /** @use HasFactory<\Database\Factories\CardFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'scry_id',
        'scry_data',
        'colors',
        'keywords',
        'oracle_text',
        'cmc',
        'type_line',
    ];

    protected $hidden = [
        'user_id',
    ];

    /** @return BelongsTo<User> */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /** @return BelongsToMany<Deck> */
    public function decks(): BelongsToMany
    {
        return $this->belongsToMany(Deck::class);
    }
}
