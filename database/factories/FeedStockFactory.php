<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeedStock>
 */
class FeedStockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $feedTypes = ['Starter', 'Grower', 'Layer', 'Finisher'];
        
        return [
            'feed_type' => $this->faker->randomElement($feedTypes),
            'current_stock' => $this->faker->randomFloat(2, 100, 1000),
            'minimum_stock' => $this->faker->randomFloat(2, 50, 200),
            'price_per_kg' => $this->faker->randomFloat(2, 8000, 15000), // IDR 8k-15k per kg
        ];
    }
}