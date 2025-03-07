<?php

namespace Database\Seeders;

use App\Models\Card;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Image;
use App\Models\Price;
use App\Models\Set;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $sets = Set::factory()
            ->count(5)
            ->for($user)
            ->create();

        Card::factory()
            ->count(50)
            ->state(new Sequence(
                ['name' => 'Test', 'type_line' => 'Human wizard'],
                ['name' => 'Fake', 'type_line' => 'Merfolk pirate'],
            ))
            ->state(new Sequence(
                ...$sets->map(fn ($set) => ['set_id' => $set])->toArray()
            ))
            ->state(new Sequence(
                ['rarity' => 'common'],
                ['rarity' => 'uncommon'],
                ['rarity' => 'rare'],
            ))
            ->state(new Sequence(
                ['colors' => []],
                ['colors' => ['R', 'G', 'U']],
                ['colors' => ['R', 'G']],
                ['colors' => ['R']],
                ['colors' => ['W']],
                ['colors' => ['B']],
            ))
            ->for($user)
            ->for(Image::factory())
            ->has(
                Price::factory()->state(fn (array $attr, Card $card) => [
                    'scry_id' => $card->scry_id,
                ])
            )
            ->create();
    }
}
