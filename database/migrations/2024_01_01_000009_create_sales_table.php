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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->nullable()->constrained()->onDelete('set null');
            $table->date('sale_date')->comment('Date of sale');
            $table->integer('quantity_eggs')->comment('Number of eggs sold');
            $table->decimal('price_per_egg', 8, 2)->comment('Price per egg');
            $table->decimal('total_amount', 10, 2)->comment('Total sale amount');
            $table->enum('payment_status', ['paid', 'pending', 'partial'])->default('paid')->comment('Payment status');
            $table->text('notes')->nullable()->comment('Additional notes about the sale');
            $table->timestamps();
            
            $table->index('sale_date');
            $table->index('payment_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};