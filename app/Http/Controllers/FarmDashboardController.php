<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DailyProduction;
use App\Models\FeedStock;
use App\Models\Sale;
use App\Models\Customer;
use App\Models\Chicken;
use App\Models\HealthRecord;
use Carbon\Carbon;
use Inertia\Inertia;

class FarmDashboardController extends Controller
{
    /**
     * Display the farm dashboard.
     */
    public function index()
    {
        // Today's statistics
        $today = Carbon::today();
        $todayProduction = DailyProduction::whereDate('production_date', $today)->first();
        
        // This week's production
        $weeklyProduction = DailyProduction::whereBetween('production_date', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->sum('total_eggs');
        
        // This month's sales
        $monthlySales = Sale::whereMonth('sale_date', Carbon::now()->month)
            ->whereYear('sale_date', Carbon::now()->year)
            ->sum('total_amount');
        
        // Feed stock alerts (low stock)
        $lowStockFeeds = FeedStock::lowStock()->count();
        
        // Recent sales
        $recentSales = Sale::with('customer')
            ->latest('sale_date')
            ->take(5)
            ->get();
        
        // Health alerts (upcoming vaccinations)
        $upcomingHealthTasks = HealthRecord::whereNotNull('next_due_date')
            ->where('next_due_date', '<=', Carbon::now()->addDays(7))
            ->with('chicken')
            ->latest('next_due_date')
            ->take(5)
            ->get();
        
        // Total chickens
        $totalChickens = Chicken::healthy()->sum('quantity');
        
        // Total customers
        $totalCustomers = Customer::count();

        return Inertia::render('welcome', [
            'stats' => [
                'todayEggs' => $todayProduction->total_eggs ?? 0,
                'weeklyEggs' => $weeklyProduction,
                'monthlySales' => $monthlySales,
                'totalChickens' => $totalChickens,
                'totalCustomers' => $totalCustomers,
                'lowStockAlerts' => $lowStockFeeds,
            ],
            'recentSales' => $recentSales,
            'healthAlerts' => $upcomingHealthTasks,
        ]);
    }
}