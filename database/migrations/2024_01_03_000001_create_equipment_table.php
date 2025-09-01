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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lab_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->string('code')->unique();
            $table->string('category');
            $table->text('description')->nullable();
            $table->json('specifications')->nullable();
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('serial_number')->nullable();
            $table->integer('purchase_year')->nullable();
            $table->decimal('purchase_price', 15, 2)->nullable();
            $table->enum('condition', ['excellent', 'good', 'fair', 'needs_repair', 'out_of_order'])->default('good');
            $table->enum('status', ['available', 'borrowed', 'maintenance', 'reserved', 'retired'])->default('available');
            $table->string('location')->nullable();
            $table->integer('max_loan_duration')->default(7);
            $table->enum('min_competency_level', ['basic', 'intermediate', 'advanced'])->nullable();
            $table->json('photos')->nullable();
            $table->text('manual_url')->nullable();
            $table->text('sop')->nullable();
            $table->string('qr_code')->nullable();
            $table->json('maintenance_schedule')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index('lab_id');
            $table->index(['status', 'condition']);
            $table->index('category');
            $table->index(['lab_id', 'status']);
            $table->index('code');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};