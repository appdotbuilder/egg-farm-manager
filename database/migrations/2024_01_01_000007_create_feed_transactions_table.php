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
        Schema::create('feed_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feed_stock_id')->constrained('feed_stocks')->onDelete('cascade');
            $table->enum('type', ['purchase', 'usage'])->comment('Type of transaction');
            $table->decimal('quantity', 10, 2)->comment('Quantity in kg');
            $table->decimal('cost', 10, 2)->nullable()->comment('Cost for purchases');
            $table->date('transaction_date')->comment('Date of transaction');
            $table->text('notes')->nullable()->comment('Additional notes');
            $table->timestamps();
            
            $table->index('transaction_date');
            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feed_transactions');
    }
};