<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worksheet>
 */
class WorksheetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'license_plate' => fake()->bothify('???-###'),
            'make' => fake()->randomElement($array = array ('AUDI','OPEL','BMW','Volkswagen')),
            'model' => fake()->bothify('??-###'),
            'owner_name' => fake()->name(),
            'owner_address' => fake()->address(),
            'closed' => false,
            'payment_method' => null,
            'closed_at' => null,
        ];
    }
}
