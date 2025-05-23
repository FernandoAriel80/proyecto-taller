<?php

use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/dashboard', [WelcomeController::class, 'getAll'])
->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/ver-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/actualizar-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/eliminar-profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/reserve-form', [ReservationController::class, 'showVehicleData'])->name('reserve.create');
    Route::post('/reserve-vehiculo', [ReservationController::class, 'saveVehicleData'])->name('reserve.store');
    
    Route::post('/reserva-reserve', [ReservationController::class, 'saveReserveData'])->name('reserve.save');

    Route::get('/ver-seguimiento', [FollowUpController::class, 'index'])->name('followUp.reservation');
    Route::get('/seguimiento-detalles', [FollowUpController::class, 'details'])->name('followUp.details');

    Route::get('/ver-detalle-general/{id}',[FollowUpController::class, 'show'])->name('followUp.details.general.data.show');
    Route::get('/ver-reporte/{id}',[FollowUpController::class, 'report'])->name('followUp.details.report');
    Route::get('/ver-notas/{id}',[FollowUpController::class, 'notes'])->name('followUp.details.notes');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
