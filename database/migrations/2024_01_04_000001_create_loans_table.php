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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('loan_number')->unique();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('equipment_id')->constrained()->onDelete('cascade');
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('set null');
            $table->enum('status', ['diajukan', 'disetujui_laboran', 'ditolak', 'diambil', 'dikembalikan', 'terlambat', 'dibatalkan'])->default('diajukan');
            $table->text('purpose');
            $table->datetime('requested_start');
            $table->datetime('requested_end');
            $table->datetime('actual_start')->nullable();
            $table->datetime('actual_end')->nullable();
            $table->string('jsa_document')->nullable();
            $table->enum('initial_condition', ['excellent', 'good', 'fair', 'needs_repair'])->nullable();
            $table->enum('return_condition', ['excellent', 'good', 'fair', 'needs_repair', 'damaged'])->nullable();
            $table->json('initial_photos')->nullable();
            $table->json('return_photos')->nullable();
            $table->text('initial_notes')->nullable();
            $table->text('return_notes')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->decimal('penalty_amount', 10, 2)->default(0);
            $table->boolean('penalty_paid')->default(false);
            $table->timestamps();
            
            $table->index('user_id');
            $table->index('equipment_id');
            $table->index('status');
            $table->index(['status', 'requested_start']);
            $table->index('loan_number');
            $table->index(['user_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};