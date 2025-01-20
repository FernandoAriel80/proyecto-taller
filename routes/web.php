<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FollowUpController;
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

    Route::get('/reserve-form', [ReservationController::class, 'showVehicleData'])->name('reserve.create');
    Route::post('/reserve-vehiculo', [ReservationController::class, 'saveVehicleData'])->name('reserve.store');
    //Route::post('/reserva-reserve', [ReservationController::class,'saveReserveData'])->name('reserve.save');
    
    //Route::get('/turnos', [ReservationController::class, 'index'])->name('turnos.index');
    Route::post('/reserva-reserve', [ReservationController::class, 'saveReserveData'])->name('reserve.save');

    Route::get('/seguimiento', [FollowUpController::class, 'index'])->name('followUp.index');
    Route::get('/seguimiento-detalles', [FollowUpController::class, 'details'])->name('followUp.details');
});

require __DIR__.'/auth.php';
