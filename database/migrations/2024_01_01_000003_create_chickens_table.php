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
        Schema::create('chickens', function (Blueprint $table) {
            $table->id();
            $table->string('breed')->comment('Chicken breed type');
            $table->integer('quantity')->comment('Number of chickens');
            $table->date('purchase_date')->comment('Date when chickens were purchased');
            $table->enum('status', ['healthy', 'sick', 'deceased'])->default('healthy');
            $table->text('notes')->nullable()->comment('Additional notes about the chickens');
            $table->timestamps();
            
            $table->index('status');
            $table->index('purchase_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chickens');
    }
};