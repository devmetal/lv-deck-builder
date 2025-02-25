<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Face>
 */
class FaceFactory extends Factory
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
            'cmc' => fake()->randomDigit(),
            'type_line' => fake()->word(),
            'colors' => fake()->randomElements(
                ['r', 'g', 'u', 'c', 'w', 'b'], 2
            ),
        ];
    }
}
