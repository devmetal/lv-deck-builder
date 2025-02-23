<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property array<array-key, mixed>|null $colors
 * @property string|null $oracle_text
 * @property int|null $cmc
 * @property string|null $type_line
 * @property int|null $image_id
 * @property int $card_id
 * @property-read \App\Models\Card $card
 * @property-read \App\Models\Image|null $image
 * @method static \Database\Factories\FaceFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Face newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Face newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Face query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Face whereCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Face whereCmc($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Face whereColors($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Face whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Face whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Face whereImageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Face whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Face whereOracleText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Face whereTypeLine($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Face whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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
