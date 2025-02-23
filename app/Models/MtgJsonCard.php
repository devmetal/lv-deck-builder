<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property string|null $artist
 * @property string|null $artistIds
 * @property string|null $asciiName
 * @property string|null $attractionLights
 * @property string|null $availability
 * @property string|null $boosterTypes
 * @property string|null $borderColor
 * @property string|null $cardParts
 * @property string|null $colorIdentity
 * @property string|null $colorIndicator
 * @property string|null $colors
 * @property string|null $defense
 * @property string|null $duelDeck
 * @property int|null $edhrecRank
 * @property float|null $edhrecSaltiness
 * @property float|null $faceConvertedManaCost
 * @property string|null $faceFlavorName
 * @property float|null $faceManaValue
 * @property string|null $faceName
 * @property string|null $finishes
 * @property string|null $flavorName
 * @property string|null $flavorText
 * @property string|null $frameEffects
 * @property string|null $frameVersion
 * @property string|null $hand
 * @property bool|null $hasAlternativeDeckLimit
 * @property bool|null $hasContentWarning
 * @property bool|null $hasFoil
 * @property bool|null $hasNonFoil
 * @property bool|null $isAlternative
 * @property bool|null $isFullArt
 * @property bool|null $isFunny
 * @property bool|null $isOnlineOnly
 * @property bool|null $isOversized
 * @property bool|null $isPromo
 * @property bool|null $isRebalanced
 * @property bool|null $isReprint
 * @property bool|null $isReserved
 * @property bool|null $isStarter
 * @property bool|null $isStorySpotlight
 * @property bool|null $isTextless
 * @property bool|null $isTimeshifted
 * @property string|null $keywords
 * @property string|null $language
 * @property string|null $layout
 * @property string|null $leadershipSkills
 * @property string|null $life
 * @property string|null $loyalty
 * @property string|null $manaCost
 * @property float|null $manaValue
 * @property string|null $name
 * @property string|null $number
 * @property string|null $originalPrintings
 * @property string|null $originalReleaseDate
 * @property string|null $originalText
 * @property string|null $originalType
 * @property string|null $otherFaceIds
 * @property string|null $power
 * @property string|null $printings
 * @property string|null $promoTypes
 * @property string|null $rarity
 * @property string|null $rebalancedPrintings
 * @property string|null $relatedCards
 * @property string|null $securityStamp
 * @property string|null $setCode
 * @property string|null $side
 * @property string|null $signature
 * @property string|null $sourceProducts
 * @property string|null $subsets
 * @property string|null $subtypes
 * @property string|null $supertypes
 * @property string|null $text
 * @property string|null $toughness
 * @property string|null $type
 * @property string|null $types
 * @property string $uuid
 * @property string|null $variations
 * @property string|null $watermark
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereArtist($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereArtistIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereAsciiName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereAttractionLights($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereAvailability($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereBoosterTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereBorderColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereCardParts($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereColorIdentity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereColorIndicator($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereColors($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereDefense($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereDuelDeck($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereEdhrecRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereEdhrecSaltiness($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereFaceConvertedManaCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereFaceFlavorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereFaceManaValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereFaceName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereFinishes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereFlavorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereFlavorText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereFrameEffects($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereFrameVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereHand($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereHasAlternativeDeckLimit($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereHasContentWarning($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereHasFoil($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereHasNonFoil($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereIsAlternative($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereIsFullArt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereIsFunny($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereIsOnlineOnly($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereIsOversized($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereIsPromo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereIsRebalanced($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereIsReprint($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereIsReserved($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereIsStarter($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereIsStorySpotlight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereIsTextless($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereIsTimeshifted($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereKeywords($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereLanguage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereLeadershipSkills($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereLife($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereLoyalty($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereManaCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereManaValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereOriginalPrintings($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereOriginalReleaseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereOriginalText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereOriginalType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereOtherFaceIds($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard wherePower($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard wherePrintings($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard wherePromoTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereRarity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereRebalancedPrintings($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereRelatedCards($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereSecurityStamp($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereSetCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereSide($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereSignature($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereSourceProducts($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereSubsets($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereSubtypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereSupertypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereToughness($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereTypes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereUuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereVariations($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MtgJsonCard whereWatermark($value)
 * @mixin \Eloquent
 */
class MtgJsonCard extends Model
{
    protected $connection = 'printings';

    protected $table = 'cards';
}
