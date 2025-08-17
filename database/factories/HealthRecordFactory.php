<?php

namespace Database\Factories;

use App\Models\Chicken;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HealthRecord>
 */
class HealthRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = $this->faker->randomElement(['vaccination', 'medication', 'checkup']);
        $treatments = [
            'vaccination' => ['Newcastle Disease Vaccine', 'Infectious Bronchitis Vaccine', 'Avian Influenza Vaccine'],
            'medication' => ['Antibiotic Treatment', 'Vitamin Supplement', 'Deworming Medicine'],
            'checkup' => ['General Health Check', 'Weight Monitoring', 'Behavior Assessment'],
        ];
        
        $recordDate = $this->faker->dateTimeBetween('-6 months', 'now');
        
        return [
            'chicken_id' => Chicken::factory(),
            'record_date' => $recordDate,
            'type' => $type,
            'treatment_name' => $this->faker->randomElement($treatments[$type]),
            'description' => $this->faker->optional(0.6)->sentence(),
            'cost' => $this->faker->optional(0.7)->randomFloat(2, 50000, 500000),
            'next_due_date' => $type === 'vaccination' ? 
                $this->faker->dateTimeBetween($recordDate, '+6 months') : 
                $this->faker->optional(0.3)->dateTimeBetween($recordDate, '+3 months'),
        ];
    }
}