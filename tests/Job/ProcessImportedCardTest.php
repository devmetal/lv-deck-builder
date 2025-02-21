<?php

namespace Tests\Job;

use App\Domain\Mapper\ScryResponseToCardModelMapper;
use App\Domain\Scry\ScryRepository;
use App\Jobs\ProcessImportedCard;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use PHPUnit\Framework\Attributes\TestWith;
use Tests\TestCase;

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

    #[TestWith(['1', 'etali.json'])]
    #[TestWith(['1', 'raffine.json'])]
    #[TestWith(['1', 'land.json'])]
    #[TestWith(['1', 'smoky.json'])]
    #[TestWith(['1', 'signet.json'])]
    #[TestWith(['1', 'multi.json'])]
    public function test_it_should_import_cards_from_scry_by_id($cardId, $fixture)
    {
        $scryCard = read_fixture($fixture);

        Http::fake([
            'api.scryfall.com/cards/'.$cardId => Http::response($scryCard, 200),
        ]);

        $user = User::factory()->create();

        $job = new ProcessImportedCard($cardId, $user);

        $job->handle(
            new ScryRepository,
            new ScryResponseToCardModelMapper
        );

        /*$this->assertDatabaseHas('images', [
            'png' => $scryCard['image_uris']['png'],
        ]);*/

        $this->assertDatabaseHas('cards', [
            'name' => $scryCard['name'],
            'user_id' => $user->id,
        ]);

        $this->assertDatabaseHas('sets', [
            'name' => $scryCard['set_name'],
            'set_id' => $scryCard['set_id'],
        ]);
    }
}
