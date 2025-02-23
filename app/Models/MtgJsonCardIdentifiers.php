<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property string|null $cardKingdomEtchedId
 * @property string|null $cardKingdomFoilId
 * @property string|null $cardKingdomId
 * @property string|null $cardsphereFoilId
 * @property string|null $cardsphereId
 * @property string|null $deckboxId
 * @property string|null $mcmId
 * @property string|null $mcmMetaId
 * @property string|null $mtgArenaId
 * @property string|null $mtgjsonFoilVersionId
 * @property string|null $mtgjsonNonFoilVersionId
 * @property string|null $mtgjsonV4Id
 * @property string|null $mtgoFoilId
 * @property string|null $mtgoId
 * @property string|null $multiverseId
 * @property string|null $scryfallCardBackId
 * @property string|null $scryfallId
 * @property string|null $scryfallIllustrationId
 * @property string|null $scryfallOracleId
 * @property string|null $tcgplayerEtchedProductId
 * @property string|null $tcgplayerProductId
 * @property string|null $uuid
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereCardKingdomEtchedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereCardKingdomFoilId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereCardKingdomId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereCardsphereFoilId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereCardsphereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereDeckboxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereMcmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereMcmMetaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereMtgArenaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereMtgjsonFoilVersionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereMtgjsonNonFoilVersionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereMtgjsonV4Id($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereMtgoFoilId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereMtgoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereMultiverseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereScryfallCardBackId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereScryfallId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereScryfallIllustrationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereScryfallOracleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereTcgplayerEtchedProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereTcgplayerProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCardIdentifiers whereUuid($value)
 * @mixin \Eloquent
 */
class MtgJsonCardIdentifiers extends Model
{
    protected $connection = 'printings';

    protected $table = 'cardIdentifiers';
}
