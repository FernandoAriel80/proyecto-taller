<?php 
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssignedEmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeNoteController;
use App\Http\Controllers\EmployeeReportController;
use App\Http\Controllers\GeneralDataController;
use App\Http\Controllers\RegisterVehicleController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

    Route::middleware(['role:admin'])->group(function () {    

        Route::get('/ver-clientes', [CustomerController::class,'index'])->name('customer.index');

        Route::get('/ver-empleados', [EmployeeController::class, 'index'])->name('employee.index');
        Route::post('/guardar-empleados', [EmployeeController::class, 'store'])->name('employee.store');
        Route::get('/obtener-empleados/{id}', [EmployeeController::class, 'edit'])->name('employee.edit');
        Route::put('/actualizar-empleados/{id}', [EmployeeController::class, 'update'])->name('employee.update');
        Route::delete('/eliminar-empleados/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');


        Route::get('/reservas-de-usuarios',[AdminController::class, 'index'])->name('reservations.index');
        Route::put('/reservas-de-usuarios-conformado/{id}',[AdminController::class, 'confirmed'])->name('reservations.confirmed');
        Route::put('/reservas-de-usuarios-rechazado/{id}',[AdminController::class, 'decline'])->name('reservations.decline');

        Route::get('/ver-enpleados-asignados',[AssignedEmployeeController::class, 'assignedEmployee'])->name('assigned.employees');

        Route::get('/ver-vehiculo-en-taller',[RegisterVehicleController::class, 'index'])->name('register.vehicle.index');
        Route::get('/registrar-vehiculo-en-taller/{id}',[RegisterVehicleController::class, 'create'])->name('register.vehicle.create');
        Route::post('/registrar-vehiculo-en-taller',[RegisterVehicleController::class, 'store'])->name('register.vehicle.store');
        Route::get('/actualizar-vehiculo-en-taller/{id}',[RegisterVehicleController::class, 'edit'])->name('register.vehicle.edit');
        Route::put('/actualizar-vehiculo-en-taller/{id}',[RegisterVehicleController::class, 'update'])->name('register.vehicle.update');
        Route::put('/dar-de-alta-vehiculo-en-taller/{id}',[RegisterVehicleController::class,'releaseVehicle']);

        Route::get('/ver-empleado-asignado',[AssignedEmployeeController::class, 'index'])->name('assign.index');
        Route::post('/asignar-empleado/{id}',[AssignedEmployeeController::class,'store'])->name('assign.store');
        Route::put('/dar-de-alta-vehiculo-desde-taller/{id}',[AssignedEmployeeController::class,'releaseVehicle']);

        //admin.workshop

        Route::get('/ver-datos-generales-empelado/{id}',[GeneralDataController::class, 'show'])->name('workshop.general.data.show');

        Route::get('/ver-reportes-del-empleado/{id}',[EmployeeReportController::class, 'show'])->name('workshop.employee.report.show');
        Route::post('/crear-reporte-empleado',[EmployeeReportController::class,'store'])->name('workshop.employee.report.store');

        Route::get('/ver-notas-del-empelado/{id}',[EmployeeNoteController::class, 'show'])->name('workshop.employee.note.show');
        Route::post('/crear-nota-del-empleado',[EmployeeNoteController::class, 'store'])->name('workshop.employee.note.store');

    });


});