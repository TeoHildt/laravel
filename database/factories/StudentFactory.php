<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'dni' => fake()->numberBetween(20000000,65999999),
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'assists' => fake()->numberBetween(0,0),
        ];
    }
}
