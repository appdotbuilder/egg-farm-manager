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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Customer name');
            $table->string('phone')->nullable()->comment('Customer phone number');
            $table->string('email')->nullable()->comment('Customer email address');
            $table->text('address')->nullable()->comment('Customer address');
            $table->enum('type', ['retail', 'wholesale', 'restaurant'])->default('retail')->comment('Customer type');
            $table->text('notes')->nullable()->comment('Additional notes about customer');
            $table->timestamps();
            
            $table->index('name');
            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};