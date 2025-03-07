<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\User;
use Arr;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Inertia\Testing\AssertableInertia as Assert;
use PHPUnit\Framework\Attributes\TestWith;
use Tests\TestCase;

class CardListTest extends TestCase
{
    use RefreshDatabase;

    public function test_card_list_page_available(): void
    {
        $this->seed();

        /** @var Authenticatable */
        $user = User::where('email', 'test@example.com')
            ->first();

        $this
            ->actingAs($user)
            ->get('/cards/list')
            ->assertStatus(200);
    }

    public function test_card_search_by_term(): void
    {
        $this->seed();

        /** @var Authenticatable */
        $user = User::where('email', 'test@example.com')
            ->first();

        $this
            ->actingAs($user)
            ->get('/cards/list?'.Arr::query(['term' => 'human wizard']))
            ->assertStatus(200)
            ->assertInertia(fn (Assert $page) => $page
                ->component('Cards/List')
                ->has('cards.0', fn (Assert $page) => $page
                    ->where('name', 'Test')
                    ->has('image.png')
                    ->has('id')
                    ->has('faces')
                    ->has('price')
                    ->has('colors')
                )
            );
    }

    #[TestWith([['R', 'G']])]
    #[TestWith([['R']])]
    #[TestWith([['B']])]
    public function test_card_search_by_colors($colors): void
    {
        $this->seed();

        /** @var Authenticatable */
        $user = User::where('email', 'test@example.com')
            ->first();

        $this
            ->actingAs($user)
            ->get('/cards/list?'.Arr::query(['colors' => $colors]))
            ->assertStatus(200)
            ->assertInertia(fn (Assert $page) => $page
                ->component('Cards/List')
                ->has('cards.0', fn (Assert $page) => $page
                    ->where('colors', $colors)
                    ->etc()
                )
            );
    }

    public function test_card_search_colorless(): void
    {
        $this->seed();

        /** @var Authenticatable */
        $user = User::where('email', 'test@example.com')
            ->first();

        $this
            ->actingAs($user)
            ->get('/cards/list?'.Arr::query(['colors' => ['C']]))
            ->assertStatus(200)
            ->assertInertia(fn (Assert $page) => $page
                ->component('Cards/List')
                ->has('cards.0', fn (Assert $page) => $page
                    ->where('colors', [])
                    ->etc()
                )
            );
    }

    public function test_card_search_by_set(): void
    {
        $this->seed();

        /** @var Authenticatable & User */
        $user = User::where('email', 'test@example.com')
            ->first();

        $set = $user->sets()->first();

        $this
            ->actingAs($user)
            ->get('/cards/list?'.Arr::query(['setId' => $set->id]))
            ->assertStatus(200)
            ->assertInertia(fn (Assert $page) => $page
                ->component('Cards/List')
                ->has('cards.0', fn (Assert $page) => $page
                    ->has('image.png')
                    ->has('id')
                    ->has('faces')
                    ->has('price')
                    ->has('colors')
                    ->etc()
                )
            );
    }

    public function test_card_search_by_rarity(): void
    {
        $this->seed();

        /** @var Authenticatable */
        $user = User::where('email', 'test@example.com')
            ->first();

        $this
            ->actingAs($user)
            ->get('/cards/list?'.Arr::query(['rarity' => 'rare']))
            ->assertStatus(200)
            ->assertInertia(fn (Assert $page) => $page
                ->component('Cards/List')
                ->has('cards.0', fn (Assert $page) => $page
                    ->has('image.png')
                    ->has('id')
                    ->has('faces')
                    ->has('price')
                    ->has('colors')
                    ->etc()
                )
            );
    }

    public function test_card_search_with_invalid_term(): void
    {
        $this->seed();

        /** @var Authenticatable */
        $user = User::where('email', 'test@example.com')
            ->first();

        $this
            ->actingAs($user)
            ->get('/cards/list?'.Arr::query([
                'term' => fake()->text(255),
            ]))
            ->assertInvalid('term');
    }

    #[TestWith(['colors', ['F']])]
    #[TestWith(['colors', ['R', 'R', 'R', 'R', 'R', 'R', 'R']])]
    #[TestWith(['setId', 'abc'])]
    #[TestWith(['setId', 99999999])]
    #[TestWith(['rarity', 'notvalid'])]
    public function test_card_search_with_invalid_query($field, $value): void
    {
        $this->seed();

        /** @var Authenticatable */
        $user = User::where('email', 'test@example.com')
            ->first();

        $this
            ->actingAs($user)
            ->get('/cards/list?'.Arr::query([
                $field => $value,
            ]))
            ->assertInvalid($field);
    }
}
