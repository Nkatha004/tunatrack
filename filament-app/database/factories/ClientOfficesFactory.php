<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClientOffices>
 */
class ClientOfficesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'email' => fake()->unique()->safeEmail(),
            'phone_number' => fake()->phoneNumber(),
            'address' => fake()->streetAddress(),
            'town' => fake()->city(),
            'country' => fake()->randomElement(['Kenya', 'Uganda', 'Tanzania', 'Rwanda', 'Burundi', 'Ethiopia']),
            'company_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
