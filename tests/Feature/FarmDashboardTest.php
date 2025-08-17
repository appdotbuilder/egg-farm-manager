<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\DailyProduction;
use App\Models\FeedStock;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FarmDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_welcome_page_displays_farm_dashboard(): void
    {
        // Create some sample data
        DailyProduction::factory()->create([
            'production_date' => today(),
            'total_eggs' => 150
        ]);
        
        Customer::factory()->count(5)->create();
        FeedStock::factory()->create(['current_stock' => 50, 'minimum_stock' => 100]);
        Sale::factory()->count(3)->create();

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertInertia(fn ($page) => $page
            ->component('welcome')
            ->has('stats')
            ->has('recentSales')
            ->has('healthAlerts')
        );
    }

    public function test_authenticated_user_can_access_dashboard(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertInertia(fn ($page) => $page->component('dashboard'));
    }

    public function test_authenticated_user_can_view_production_list(): void
    {
        $user = User::factory()->create();
        DailyProduction::factory()->count(3)->create();

        $response = $this->actingAs($user)->get('/production');

        $response->assertStatus(200);
        $response->assertInertia(fn ($page) => $page
            ->component('production/index')
            ->has('productions.data', 3)
        );
    }

    public function test_authenticated_user_can_view_customers_list(): void
    {
        $user = User::factory()->create();
        Customer::factory()->count(5)->create();

        $response = $this->actingAs($user)->get('/customers');

        $response->assertStatus(200);
        $response->assertInertia(fn ($page) => $page
            ->component('customers/index')
            ->has('customers.data', 5)
        );
    }

    public function test_guest_cannot_access_protected_routes(): void
    {
        $response = $this->get('/dashboard');
        $response->assertRedirect('/login');

        $response = $this->get('/production');
        $response->assertRedirect('/login');

        $response = $this->get('/customers');
        $response->assertRedirect('/login');
    }

    public function test_dashboard_displays_correct_statistics(): void
    {
        // Create test data
        DailyProduction::factory()->create([
            'production_date' => today(),
            'total_eggs' => 200
        ]);

        DailyProduction::factory()->create([
            'production_date' => today()->subDay(),
            'total_eggs' => 180
        ]);

        $customer = Customer::factory()->create();
        Sale::factory()->create([
            'customer_id' => $customer->id,
            'sale_date' => today(),
            'total_amount' => 100000
        ]);

        FeedStock::factory()->create([
            'current_stock' => 50,
            'minimum_stock' => 100
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertInertia(fn ($page) => $page
            ->where('stats.todayEggs', 200)
            ->where('stats.totalCustomers', 1)
            ->where('stats.lowStockAlerts', 1)
        );
    }
}