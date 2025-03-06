<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use App\Models\VehicleInWorkshop;
use Illuminate\Http\Request;

class RegisterVehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /* $in_workshops = VehicleInWorkshop::all();
        return view('admin.registerVehicle.index', compact("in_workshops")); */
        $query = VehicleInWorkshop::query();
        $search = $request->input('search', '');

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%$search%")
                    ->orWhere('email', 'LIKE', "%$search%")
                    ->orWhere('license_plate', 'LIKE', "%$search%");
            });
        }
        $query->orderByDesc("id");
        $in_workshops = $query->paginate(5);

        return view("admin.registerVehicle.index", compact('in_workshops', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $id)
    {
        try {
            $reservation = Reservation::with(['user', 'vehicle'])->findOrFail($id);

            return view('admin.reservations.create', compact('reservation'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'vehicle' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'license_plate' => 'required|string|max:20',
            'year' => 'required|integer|min:1900|max:' . (date('Y')),
            'description' => 'nullable|string|max:1000',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe exceder los 255 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.max' => 'El correo electrónico no debe exceder los 255 caracteres.',

            'phone_number.required' => 'El número de teléfono es obligatorio.',
            'phone_number.string' => 'El número de teléfono debe ser una cadena de texto.',
            'phone_number.max' => 'El número de teléfono no debe exceder los 15 caracteres.',

            'vehicle.required' => 'El tipo de vehículo es obligatorio.',
            'vehicle.string' => 'El tipo de vehículo debe ser una cadena de texto.',
            'vehicle.max' => 'El tipo de vehículo no debe exceder los 255 caracteres.',

            'brand.required' => 'La marca es obligatoria.',
            'brand.string' => 'La marca debe ser una cadena de texto.',
            'brand.max' => 'La marca no debe exceder los 255 caracteres.',

            'license_plate.required' => 'La patente es obligatoria.',
            'license_plate.string' => 'La patente debe ser una cadena de texto.',
            'license_plate.max' => 'La patente no debe exceder los 20 caracteres.',

            'year.required' => 'El año es obligatorio.',
            'year.integer' => 'El año debe ser un número entero.',
            'year.min' => 'El año debe ser mayor o igual a 1900.',
            'year.max' => 'El año no puede ser mayor al año actual.',

            'description.string' => 'La descripción debe ser una cadena de texto.',
            'description.max' => 'La descripción no debe exceder los 1000 caracteres.',
        ]);
        try {
            $in_wordkshop = new VehicleInWorkshop();

            $in_wordkshop->create([
                "name" => $request->name,
                "email" => $request->email,
                "phone_number" => $request->phone_number,
                "vehicle_type" => $request->vehicle,
                "brand" => $request->brand,
                "license_plate" => $request->license_plate,
                "year" => $request->year,
                "description" => $request->description,
                "check_in_date" => now(),
            ]);

            return redirect()->route('dashboard');
        } catch (\Throwable $th) {
            throw $th;
        }
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
