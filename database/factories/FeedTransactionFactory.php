<?php

namespace Database\Factories;

use App\Models\FeedStock;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeedTransaction>
 */
class FeedTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['purchase', 'usage']);
        $quantity = $this->faker->randomFloat(2, 10, 100);
        
        return [
            'feed_stock_id' => FeedStock::factory(),
            'type' => $type,
            'quantity' => $quantity,
            'cost' => $type === 'purchase' ? $this->faker->randomFloat(2, 50000, 200000) : null,
            'transaction_date' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'notes' => $this->faker->optional(0.3)->sentence(),
        ];
    }
}