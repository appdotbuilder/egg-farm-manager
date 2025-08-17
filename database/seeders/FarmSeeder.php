<?php

namespace Database\Seeders;

use App\Models\Chicken;
use App\Models\Customer;
use App\Models\DailyProduction;
use App\Models\FeedStock;
use App\Models\HealthRecord;
use App\Models\Sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FarmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create chickens
        $chickens = Chicken::factory(5)->create();
        
        // Create customers
        $customers = Customer::factory(20)->create();
        
        // Create feed stock
        FeedStock::factory()->create(['feed_type' => 'Layer', 'current_stock' => 150.50, 'minimum_stock' => 100]);
        FeedStock::factory()->create(['feed_type' => 'Starter', 'current_stock' => 80.25, 'minimum_stock' => 100]); // Low stock
        FeedStock::factory()->create(['feed_type' => 'Grower', 'current_stock' => 200.75, 'minimum_stock' => 150]);
        
        // Create daily productions for the last 30 days
        for ($i = 0; $i < 30; $i++) {
            DailyProduction::factory()->create([
                'production_date' => now()->subDays($i)->format('Y-m-d')
            ]);
        }
        
        // Create health records
        foreach ($chickens as $chicken) {
            HealthRecord::factory(random_int(2, 5))->create([
                'chicken_id' => $chicken->id
            ]);
        }
        
        // Create sales
        Sale::factory(50)->create();
    }
}