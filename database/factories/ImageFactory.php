<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'png' => '/fake.png',
            'art' => '/fake.png',
            'large' => '/fake.png',
            'normal' => '/fake.png',
            'small' => '/fake.png',
        ];
    }
}
