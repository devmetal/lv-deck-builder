<?php

declare(strict_types=1);

namespace Tests\Feature\Deck;

use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateDeckTest extends TestCase
{
    use RefreshDatabase;

    public function test_deck_list_page_with_create_form_visible(): void
    {
        /** @var Authenticatable */
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->get('/decks')
            ->assertStatus(200);
    }

    public function test_create_deck_from_deck_list(): void
    {
        /** @var Authenticatable */
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->from('/decks')
            ->post('/decks', ['name' => 'Test Deck'])
            ->assertSessionHasNoErrors()
            ->assertValid()
            ->assertRedirectContains('/edit');

        $this->assertDatabaseHas('decks', [
            'name' => 'Test Deck',
        ]);
    }

    public function test_create_deck_from_deck_list_with_invalid_data(): void
    {
        /** @var Authenticatable */
        $user = User::factory()->create();

        $this
            ->actingAs($user)
            ->from('/decks')
            ->post('/decks', ['name' => ''])
            ->assertSessionHasErrors()
            ->assertInvalid('name');

        $this->assertDatabaseCount('decks', 0);
    }
}
