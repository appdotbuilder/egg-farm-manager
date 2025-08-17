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
        Schema::create('daily_productions', function (Blueprint $table) {
            $table->id();
            $table->date('production_date')->comment('Date of egg production');
            $table->integer('total_eggs')->comment('Total number of eggs collected');
            $table->integer('good_eggs')->comment('Number of good quality eggs');
            $table->integer('broken_eggs')->default(0)->comment('Number of broken eggs');
            $table->integer('small_eggs')->default(0)->comment('Number of small eggs');
            $table->decimal('mortality_count', 8, 0)->default(0)->comment('Number of chickens that died');
            $table->text('notes')->nullable()->comment('Additional notes for the day');
            $table->timestamps();
            
            $table->unique('production_date');
            $table->index('production_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_productions');
    }
};