<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'phone' => $this->faker->optional(0.8)->phoneNumber(),
            'email' => $this->faker->optional(0.6)->safeEmail(),
            'address' => $this->faker->optional(0.7)->address(),
            'type' => $this->faker->randomElement(['retail', 'wholesale', 'restaurant']),
            'notes' => $this->faker->optional(0.3)->sentence(),
        ];
    }
}