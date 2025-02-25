<?php

namespace Tests\Feature;

use App\Models\Card;
use App\Models\Image;
use App\Models\Price;
use App\Models\Set;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_page_is_displayed(): void
    {
        /** @var Authenticatable */
        $user = User::factory()->create();

        $cards = Card::factory()
            ->count(20)
            ->for($user)
            ->for(Image::factory())
            ->for(Set::factory()->for($user))
            ->has(
                Price::factory()
                    ->count(1)
                    ->state(function (array $attributes, Card $card) {
                        return ['scry_id' => $card->scry_id];
                    })
            )
            ->create();

        $response = $this
            ->actingAs($user)
            ->get('/dashboard');

        $response->assertStatus(200);

        // check the props has the cards with prices
    }
}
