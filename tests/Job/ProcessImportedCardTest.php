<?php

namespace Tests\Job;

use App\Domain\Mapper\ScryResponseToCardModelMapper;
use App\Domain\Scry\ScryRepository;
use App\Jobs\ProcessImportedCard;
use App\Models\Card;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use PHPUnit\Framework\Attributes\TestWith;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;

function read_fixture($fixture)
{
    $path = implode(
        DIRECTORY_SEPARATOR,
        [__DIR__, '..', 'Fixtures', $fixture]
    );

    $file = file_get_contents($path);

    return json_decode($file, true);
}

class ProcessImportedCardTest extends TestCase
{
    use RefreshDatabase;

    #[TestWith(['etali.json'])]
    #[TestWith(['raffine.json'])]
    #[TestWith(['land.json'])]
    #[TestWith(['smoky.json'])]
    #[TestWith(['signet.json'])]
    #[TestWith(['multi.json'])]
    public function test_it_should_import_cards_from_scry_by_id($fixture)
    {
        $scryCard = read_fixture($fixture);

        Http::fake([
            'api.scryfall.com/cards/1' => Http::response($scryCard, 200),
        ]);

        $user = User::factory()->create();

        $job = new ProcessImportedCard('1', $user);

        $job->handle(
            new ScryRepository,
            new ScryResponseToCardModelMapper
        );

        if (isset($scryCard['image_uris'])) {
            $this->assertDatabaseHas('images', [
                'png' => $scryCard['image_uris']['png'],
            ]);
        }

        $this->assertDatabaseHas('cards', [
            'name' => $scryCard['name'],
            'user_id' => $user->id,
        ]);

        if (isset($scryCard['image_uris'])) {
            $this->assertDatabaseHas('images', [
                'png' => $scryCard['image_uris']['png'],
            ]);
        }

        $this->assertDatabaseHas('sets', [
            'name' => $scryCard['set_name'],
            'set_id' => $scryCard['set_id'],
        ]);
    }
}
