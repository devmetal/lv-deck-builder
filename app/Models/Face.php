<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Face extends Model
{
    /** @use HasFactory<\Database\Factories\FaceFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'colors',
        'oracle_text',
        'cmc',
        'type_line',
    ];

    protected $casts = [
        'colors' => 'json',
    ];

    /** @return BelongsTo<Image> */
    public function image(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }

    /** @return BelongsTo<Card> */
    public function card(): BelongsTo
    {
        return $this->belongsTo(Card::class);
    }
}
