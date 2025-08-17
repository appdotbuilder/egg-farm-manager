<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DailyProduction>
 */
class DailyProductionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $totalEggs = $this->faker->numberBetween(100, 400);
        $goodEggs = $this->faker->numberBetween(intval($totalEggs * 0.8), $totalEggs);
        $brokenEggs = $this->faker->numberBetween(0, intval($totalEggs * 0.1));
        $smallEggs = $totalEggs - $goodEggs - $brokenEggs;
        
        return [
            'production_date' => $this->faker->dateTimeBetween('-3 months', 'now'),
            'total_eggs' => $totalEggs,
            'good_eggs' => $goodEggs,
            'broken_eggs' => $brokenEggs,
            'small_eggs' => max(0, $smallEggs),
            'mortality_count' => $this->faker->numberBetween(0, 3),
            'notes' => $this->faker->optional(0.3)->sentence(),
        ];
    }
}