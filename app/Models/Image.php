<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Image extends Model
{
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;

    protected $fillable = [
        'png',
        'art',
        'large',
        'normal',
        'small',
    ];

    /** @return HasMany<Card> */
    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }
}
