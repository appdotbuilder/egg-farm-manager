<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chicken>
 */
class ChickenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $breeds = ['Layer', 'Broiler', 'Rhode Island Red', 'Leghorn', 'Sussex'];
        
        return [
            'breed' => $this->faker->randomElement($breeds),
            'quantity' => $this->faker->numberBetween(50, 200),
            'purchase_date' => $this->faker->dateTimeBetween('-1 year', '-1 month'),
            'status' => $this->faker->randomElement(['healthy', 'healthy', 'healthy', 'sick']), // Mostly healthy
            'notes' => $this->faker->optional()->sentence(),
        ];
    }
}