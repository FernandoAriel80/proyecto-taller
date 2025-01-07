<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Illuminate\Http\Request;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return redirect("dashboard");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $vehicleTypes = VehicleType::all();
        return view('reserve.index', compact(['brands','vehicleTypes']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $validatedData = $request->validate([
            'patente' => 'required|unique:vehicles|max:10',
            'marca' => 'required|string',
            'modelo' => 'required|string|max:50',
            'anio' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'tipo_vehiculo' => 'required|string|max:50',
        ], [
            'patente.required' => 'La patente es obligatoria.',
            'patente.unique' => 'La patente ya está registrada.',
            'patente.max' => 'La patente no puede superar los 10 caracteres.',
            'marca.required' => 'La marca es obligatoria.',
            'modelo.required' => 'El modelo es obligatorio.',
            'anio.required' => 'El año es obligatorio.',
            'anio.integer' => 'El año debe ser un número entero.',
            'anio.digits' => 'El año debe tener 4 dígitos.',
            'anio.min' => 'El año no puede ser anterior a 1900.',
            'anio.max' => 'El año no puede ser mayor al actual.',
            'tipo_vehiculo.required' => 'El tipo de vehículo es obligatorio.',
        ]);

        // Guardar los datos en la base de datos
        Vehicle::create($validatedData);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'El vehículo ha sido registrado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
