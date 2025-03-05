<?php

namespace Tests\Unit;

use App\Services\External\Scry\ScryCardReader;
use Closure;
use Illuminate\Support\Facades\Http;
use PHPUnit\Framework\Attributes\TestWith;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;

/**
 * @return array<string, mixed>
 */
function convert_to_array(mixed $value): array
{
    $str = json_encode($value);

    return json_decode($str, true);
}

function get_value_by_path($path, $arr)
{
    $result = &$arr;

    foreach ($path as $key) {
        $result = &$result[$key];

        if (! isset($result)) {
            return null;
        }
    }

    return $result;
}

function traverse($arr, Closure $cb)
{
    $inner = function ($root, $path) use (&$cb, &$inner) {
        foreach ($root as $key => $value) {
            if (is_array($value)) {
                $inner($value, [...$path, $key]);
            } else {
                $cb($path, $key, $value);
            }
        }
    };

    $inner($arr, []);
}

function read_fixture($fixture)
{
    $path = implode(
        DIRECTORY_SEPARATOR,
        [__DIR__, '..', 'Fixtures', $fixture]
    );

    $file = file_get_contents($path);

    return json_decode($file, true);
}

class ScryCardReaderTest extends TestCase
{
    #[TestWith(['etali.json'])]
    #[TestWith(['raffine.json'])]
    #[TestWith(['land.json'])]
    #[TestWith(['smoky.json'])]
    #[TestWith(['signet.json'])]
    #[TestWith(['multi.json'])]
    public function test_is_can_read_cards_from_api($fixture): void
    {
        $repository = new ScryCardReader;

        $scryCard = read_fixture($fixture);

        Http::fake([
            'api.scryfall.com/cards/1' => Http::response($scryCard, 200),
        ]);

        $readedCard = convert_to_array(
            $repository->getScryCardFromApi('1')
        );

        traverse($scryCard, function ($path, $key, $value) use (&$readedCard) {
            $inCard = get_value_by_path([...$path, $key], $readedCard);
            assertEquals($value, $inCard, 'Invalid In path: '.implode('-', $path).' => (Card) '.$key.'='.$inCard.', (Fake) '.$key.'='.$value);
        });
    }

    #[TestWith(['raffine.json'])]
    #[TestWith(['signet.json'])]
    public function test_is_can_create_simple_entities($fixture): void
    {
        $repository = new ScryCardReader;

        $scryCard = read_fixture($fixture);

        Http::fake([
            'api.scryfall.com/cards/1' => Http::response($scryCard, 200),
        ]);

        $cardEntity = $repository->readExternalCard('1');

        assertEquals($scryCard['name'], $cardEntity->name);
        assertEquals($scryCard['oracle_text'], $cardEntity->oracle_text);
        assertEquals($scryCard['cmc'], $cardEntity->cmc);
        assertEquals($scryCard['type_line'], $cardEntity->type_line);
        assertEquals($scryCard['image_uris']['png'], $cardEntity->images->png);
        assertEquals($scryCard['set_id'], $cardEntity->set_id);
        assertEquals($scryCard['set_name'], $cardEntity->set_name);
        assertEquals($scryCard['id'], $cardEntity->scry_id);

        foreach ($scryCard['color_identity'] as $index => $color) {
            assertEquals($color, $cardEntity->colors[$index]);
        }

        foreach ($scryCard['keywords'] as $index => $keyword) {
            assertEquals($keyword, $cardEntity->keywords[$index]);
        }
    }

    #[TestWith(['multi.json'])]
    public function test_is_can_create_multi_face_entities($fixture): void
    {
        $repository = new ScryCardReader;

        $scryCard = read_fixture($fixture);

        Http::fake([
            'api.scryfall.com/cards/1' => Http::response($scryCard, 200),
        ]);

        $cardEntity = $repository->readExternalCard('1');

        assertEquals($scryCard['name'], $cardEntity->name);
        assertEquals($scryCard['cmc'], $cardEntity->cmc);
        assertEquals($scryCard['type_line'], $cardEntity->type_line);
        assertEquals($scryCard['set_id'], $cardEntity->set_id);
        assertEquals($scryCard['set_name'], $cardEntity->set_name);
        assertEquals($scryCard['id'], $cardEntity->scry_id);

        foreach ($scryCard['color_identity'] as $index => $color) {
            assertEquals($color, $cardEntity->colors[$index]);
        }

        foreach ($scryCard['keywords'] as $index => $keyword) {
            assertEquals($keyword, $cardEntity->keywords[$index]);
        }

        foreach ($scryCard['card_faces'] as $index => $face) {
            assertEquals($face['name'], $cardEntity->faces[$index]->name);
            assertEquals($face['image_uris']['png'], $cardEntity->faces[$index]->images->png);
        }
    }
}
