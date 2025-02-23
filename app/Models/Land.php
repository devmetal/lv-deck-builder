<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property int $count
 * @property int $deck_id
 * @method static \Database\Factories\LandFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Land newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Land newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Land query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Land whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Land whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Land whereDeckId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Land whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Land whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Land whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Land extends Model
{
    /** @use HasFactory<\Database\Factories\LandFactory> */
    use HasFactory;
}
