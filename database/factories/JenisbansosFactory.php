<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jenisbansos>
 */
class JenisbansosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_bansos' => fake()->randomElement(['bansos 1', 'bansos 2', 'bansos 3', 'bansos 4']),
            'status' => fake()->randomElement([1, 0]),
        ];
    }
}
