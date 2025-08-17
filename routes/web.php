<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DailyProductionController;
use App\Http\Controllers\FarmDashboardController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/health-check', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toISOString(),
    ]);
})->name('health-check');

Route::get('/', [FarmDashboardController::class, 'index'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
    
    // Farm Management Routes
    Route::resource('production', DailyProductionController::class);
    Route::resource('customers', CustomerController::class);
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
