<?php

namespace App\Models;

use Database\Factories\PriceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Price extends Model
{
    /** @use HasFactory<PriceFactory> */
    use HasFactory;

    protected $fillable = [
        'price',
        'currency'
    ];

    /** @return BelongsTo<Card> */
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }
}
