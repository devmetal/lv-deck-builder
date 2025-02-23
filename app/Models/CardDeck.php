<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $card_id
 * @property int $deck_id
 * @property int $column
 * @property int $row
 * @method static \Database\Factories\CardDeckFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CardDeck newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CardDeck newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CardDeck query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CardDeck whereCardId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CardDeck whereColumn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CardDeck whereDeckId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|CardDeck whereRow($value)
 * @mixin \Eloquent
 */
class CardDeck extends Model
{
    /** @use HasFactory<\Database\Factories\CardDeckFactory> */
    use HasFactory;
}
