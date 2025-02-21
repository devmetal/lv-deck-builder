<?php

namespace Tests\Unit;

use App\Domain\Scry\ScryRepository;
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

class ScryRepositoryTest extends TestCase
{
    #[TestWith(['etali.json'])]
    #[TestWith(['raffine.json'])]
    #[TestWith(['land.json'])]
    #[TestWith(['smoky.json'])]
    #[TestWith(['signet.json'])]
    #[TestWith(['multi.json'])]
    public function test_is_can_read_cards($fixture): void
    {
        $repository = new ScryRepository;

        $scryCard = read_fixture($fixture);

        Http::fake([
            'api.scryfall.com/cards/1' => Http::response($scryCard, 200),
        ]);

        $readedCard = convert_to_array(
            $repository->getCardByScryId('1')
        );

        // assert the card readed and parsed with repository
        // holds all the information readed from the
        // actual scry api responses
        traverse($scryCard, function ($path, $key, $value) use (&$readedCard) {
            $inCard = get_value_by_path([...$path, $key], $readedCard);
            assertEquals($value, $inCard, 'Invalid In path: '.implode('-', $path).' => (Card) '.$key.'='.$inCard.', (Fake) '.$key.'='.$value);
        });
    }
}
