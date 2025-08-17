<?php

namespace Database\Factories;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $quantityEggs = $this->faker->numberBetween(10, 200);
        $pricePerEgg = $this->faker->randomFloat(2, 1000, 2000); // IDR 1000-2000 per egg
        $totalAmount = $quantityEggs * $pricePerEgg;
        
        return [
            'customer_id' => $this->faker->optional(0.7)->randomElement(Customer::pluck('id')->toArray()),
            'sale_date' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'quantity_eggs' => $quantityEggs,
            'price_per_egg' => $pricePerEgg,
            'total_amount' => $totalAmount,
            'payment_status' => $this->faker->randomElement(['paid', 'paid', 'paid', 'pending']), // Mostly paid
            'notes' => $this->faker->optional(0.2)->sentence(),
        ];
    }
}