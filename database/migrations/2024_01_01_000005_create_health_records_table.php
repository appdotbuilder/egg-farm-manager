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
        Schema::create('health_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('chicken_id')->constrained()->onDelete('cascade');
            $table->date('record_date')->comment('Date of health record');
            $table->enum('type', ['vaccination', 'medication', 'checkup'])->comment('Type of health record');
            $table->string('treatment_name')->comment('Name of vaccination, medication or checkup type');
            $table->text('description')->nullable()->comment('Description of the treatment');
            $table->decimal('cost', 10, 2)->nullable()->comment('Cost of the treatment');
            $table->date('next_due_date')->nullable()->comment('Next due date for recurring treatments');
            $table->timestamps();
            
            $table->index('record_date');
            $table->index('type');
            $table->index('next_due_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_records');
    }
};