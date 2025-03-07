<?php

namespace Tests\Feature;

use App\Models\Card;
use App\Models\Image;
use App\Models\Price;
use App\Models\Set;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_page_is_displayed(): void
    {
        /** @var Authenticatable */
        $user = User::factory()->create();

        $sets = Set::factory()->for($user)->create();

        $cards = Card::factory()
            ->count(5)
            ->for($user)
            ->for(Image::factory())
            ->for($sets)
            ->has(
                Price::factory()
                    ->count(1)
                    ->state(function (array $attributes, Card $card) {
                        return ['scry_id' => $card->scry_id];
                    })
            )
            ->create();

        $this
            ->actingAs($user)
            ->get('/dashboard')
            ->assertStatus(200)
            ->assertInertia(function (Assert $page) use (&$sets, &$cards) {
                $page->component('Dashboard/Show')
                    ->has('cards', 5)
                    ->where('cards.0.image.png', $cards[0]->image->png)
                    ->where('cards.1.image.png', $cards[1]->image->png)
                    ->where('cards.2.image.png', $cards[2]->image->png)
                    ->where('cards.3.image.png', $cards[3]->image->png)
                    ->where('cards.4.image.png', $cards[4]->image->png)
                    ->has('sets', $sets->count());
            });
    }
}
