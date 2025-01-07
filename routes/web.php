<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', [WelcomeController::class, 'getAll'])
->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['role:admin'])->group(function () {    
        Route::get('/admin/menu', [AdminController::class, 'index'])->name('admin.menu');
    });

    Route::get('/reserve-form', [ReservationController::class, 'create'])->name('reserve.create');
    Route::post('/guardar-vehiculo', [ReservationController::class, 'store'])->name('vehicle.store');
});

require __DIR__.'/auth.php';
