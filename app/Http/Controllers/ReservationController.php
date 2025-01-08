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
    public function create( Request $request)
    {
        $currenlyID = 1;
        $brands = Brand::all();
        $vehicle_types = VehicleType::all();
        $vehicles = Vehicle::with('brand')->where("user_id",$request->user()->id)->get();
        $vehicle = Vehicle::where("user_id",$request->user()->id)->orderByDesc("id")->first();

        if ($request->has('vehicle_id')) {
            $vehicle = Vehicle::where("user_id",$request->user()->id)->find($request->vehicle_id);
        }
        
        return view('reserve.index', compact(['brands','vehicle_types','vehicle','vehicles']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos
        $validatedData = $request->all();
        $validatedData = $request->validate([
            'license_plate' => 'required|unique:vehicles|max:10',
            'model' => 'required|string|max:50',
            'year' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'brand' => 'required|string',
            'vehicle_type' => 'required|integer|max:50',
        ],
        /* [
            'license_plate.required' => 'El campo "Patente" es obligatorio.',
            'license_plate.max' => 'La "Patente" no puede tener más de 10 caracteres.',
        ] */
       [
            'license_plate.required' => 'La patente es obligatoria.',
            'license_plate.unique' => 'La patente ya está registrada.',
            'license_plate.max' => 'La patente no puede superar los 10 caracteres.',
            'model.required' => 'El modelo es obligatorio.',
            'year.required' => 'El año es obligatorio.',
            'year.integer' => 'El año debe ser un número entero.',
            'year.digits' => 'El año debe tener 4 dígitos.',
            'year.min' => 'El año no puede ser anterior a 1900.',
            'year.max' => 'El año no puede ser mayor al actual.',
            'brand.required' => 'La marca es obligatoria.',
            'vehicle_type.required' => 'El tipo de vehículo es obligatorio.',
        ]);

        // Guardar los datos en la base de datos
        Vehicle::create([
            'license_plate'=> $validatedData['license_plate'],
            'model'=> $validatedData['model'],
            'year'=> $validatedData['year'],
            'brand_id'=> $validatedData['brand'],
            'vehicle_type_id'=> $validatedData['vehicle_type'],
            'user_id' => $request->user()->id
            
        ]);

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
