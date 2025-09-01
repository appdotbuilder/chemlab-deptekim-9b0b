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
        Schema::create('maintenance_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('equipment_id')->constrained()->onDelete('cascade');
            $table->foreignId('performed_by')->constrained('users')->onDelete('cascade');
            $table->enum('type', ['preventive', 'corrective', 'calibration', 'inspection']);
            $table->datetime('scheduled_date');
            $table->datetime('completed_date')->nullable();
            $table->enum('status', ['scheduled', 'in_progress', 'completed', 'cancelled'])->default('scheduled');
            $table->text('description');
            $table->text('work_performed')->nullable();
            $table->text('findings')->nullable();
            $table->text('recommendations')->nullable();
            $table->decimal('cost', 12, 2)->nullable();
            $table->json('parts_used')->nullable();
            $table->json('photos')->nullable();
            $table->datetime('next_maintenance')->nullable();
            $table->timestamps();
            
            $table->index('equipment_id');
            $table->index(['status', 'scheduled_date']);
            $table->index('type');
            $table->index('performed_by');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_records');
    }
};