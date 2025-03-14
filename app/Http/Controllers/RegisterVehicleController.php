<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterVehicleStoreUpdateRequest;
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
    public function store(RegisterVehicleStoreUpdateRequest $request)
    {
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
        try {
            $in_workshop = VehicleInWorkshop::findOrFail($id);
            return view('admin.registerVehicle.edit',compact('in_workshop'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RegisterVehicleStoreUpdateRequest $request, string $id)
    {
        try {

            $current_vehicle = VehicleInWorkshop::findOrFail($id);

            $current_vehicle->update([
                "name" => $request->name,
                "email" => $request->email,
                "phone_number" => $request->phone_number,
                "vehicle" => $request->vehicle,
                "brand" => $request->brand,
                "license_plate" => $request->license_plate,
                "year" => $request->year,
                "description" => $request->description,
            ]);

            $current_vehicle->save();

            return redirect()->route('register.vehicle.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
