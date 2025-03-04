<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FollowUpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserController;
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
        Route::get('/admin/menu', function(){
            return view('admin.menu');
        })->name('admin.menu');

        Route::get('/admin/clientes', [CustomerController::class,'index'])->name('customer.index');

        Route::get('/admin/empleados', [EmployeeController::class, 'index'])->name('employee.index');
        Route::post('/admin/empleados', [EmployeeController::class, 'store'])->name('employee.store');
        Route::get('/admin/empleados/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
        Route::put('/admin/empleados/{id}', [EmployeeController::class, 'update'])->name('employee.update');
        Route::delete('/admin/empleados/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');


        Route::get('/reservas-de-usuarios',[AdminController::class, 'index'])->name('reservations.index');
        Route::put('/reservas-de-usuarios-conformado/{id}',[AdminController::class, 'confirmed'])->name('reservations.confirmed');
        Route::put('/reservas-de-usuarios-rechazado/{id}',[AdminController::class, 'decline'])->name('reservations.decline');

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
