<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'scry_id' => fake()->uuid(),
            'cmc' => fake()->randomDigit(),
            'type_line' => fake()->word(),
            'keywords' => fake()->words(),
            'rarity' => fake()->randomElement([
                'common',
                'uncommon',
                'rare',
                'mythic',
            ]),
            'colors' => fake()->randomElements(
                ['R', 'G', 'U', 'W', 'B'], 2
            ),
        ];
    }
}
