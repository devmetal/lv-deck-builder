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

function read_fixture($fixture)
{
    $path = implode(
        DIRECTORY_SEPARATOR,
        [__DIR__, '..', '..', 'Fixtures', $fixture]
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

        // card added to the database
        $this->assertDatabaseHas('cards', [
            'name' => $scryCard['name'],
            'user_id' => $user->id,
        ]);

        // if the card has top level image
        // the image also added to the database
        if (isset($scryCard['image_uris'])) {
            $this->assertDatabaseHas('images', [
                'png' => $scryCard['image_uris']['png'],
            ]);
        }

        // The set that contains the card
        // is added to the database
        $this->assertDatabaseHas('sets', [
            'name' => $scryCard['set_name'],
            'set_id' => $scryCard['set_id'],
        ]);

        // if the card has faces, the faces
        // also written in the database
        if (isset($scryCard['card_faces'])) {
            foreach ($scryCard['card_faces'] as $face) {
                $this->assertDatabaseHas('faces', [
                    'name' => $face['name'],
                ]);

                // if the face has images,
                // they also added to the database
                if (isset($face['image_uris'])) {
                    $this->assertDatabaseHas('images', [
                        'png' => $face['image_uris']['png'],
                    ]);
                }
            }
        }
    }
}
