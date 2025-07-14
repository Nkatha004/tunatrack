<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'address' => fake()->streetAddress(),
            'town' => fake()->city(),
            'country' => fake()->randomElement(['Kenya', 'Uganda', 'Tanzania', 'Rwanda', 'Burundi', 'Ethiopia']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
