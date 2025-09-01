<?php

use App\Http\Controllers\EquipmentController;

use App\Http\Controllers\LoanController;
use Illuminate\Support\Facades\Route;

Route::get('/health-check', function () {
    return response()->json([
        'status' => 'ok',
        'timestamp' => now()->toISOString(),
    ]);
})->name('health-check');

Route::view('/', 'pages.landing')->name('landing');

// Auth routes placeholder - these will work with existing Breeze/auth system
Route::view('/login', 'auth.login')->name('login');
Route::view('/register/student', 'auth.register-student')->name('register.student');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard.index')->name('dashboard');
    Route::get('equipment', [EquipmentController::class, 'index'])->name('equipment.index');
    Route::get('loans/create', [LoanController::class, 'create'])->name('loans.create');
    Route::post('loans', [LoanController::class, 'store'])->name('loans.store');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';