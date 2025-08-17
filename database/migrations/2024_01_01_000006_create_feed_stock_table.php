<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('feed_stocks', function (Blueprint $table) {
            $table->id();
            $table->string('feed_type')->comment('Type of feed (starter, grower, layer)');
            $table->decimal('current_stock', 10, 2)->comment('Current stock in kg');
            $table->decimal('minimum_stock', 10, 2)->comment('Minimum stock alert level');
            $table->decimal('price_per_kg', 10, 2)->comment('Price per kilogram');
            $table->timestamps();
            
            $table->index('feed_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feed_stocks');
    }
};