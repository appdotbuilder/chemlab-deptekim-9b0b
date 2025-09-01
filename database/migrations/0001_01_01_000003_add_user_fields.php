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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['admin', 'kepala_lab', 'laboran', 'dosen', 'mahasiswa'])->default('mahasiswa');
            $table->foreignId('lab_id')->nullable()->constrained('labs')->onDelete('set null');
            $table->string('student_id')->nullable();
            $table->string('staff_id')->nullable();
            $table->enum('status', ['active', 'menunggu_verifikasi', 'suspended'])->default('menunggu_verifikasi');
            $table->boolean('must_change_password')->default(false);
            
            $table->index(['role', 'status']);
            $table->index('lab_id');
            $table->index('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['role', 'status']);
            $table->dropIndex(['lab_id']);
            $table->dropIndex(['status']);
            $table->dropForeign(['lab_id']);
            $table->dropColumn(['role', 'lab_id', 'student_id', 'staff_id', 'status', 'must_change_password']);
        });
    }
};