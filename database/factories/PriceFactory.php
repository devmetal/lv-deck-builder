<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Price>
 */
class PriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'mtgjson_uuid' => fake()->uuid(),
            'scry_id' => fake()->uuid(),
            'provider' => 'cardmarket',
            'currency' => 'USD',
            'price' => fake()->randomFloat(2),
            'source_date' => fake()->date(),
        ];
    }
}
