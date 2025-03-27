<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssignedEmployee;
use App\Models\VehicleInWorkshop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssignedEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $assigned_vehicles = AssignedEmployee::with(['vehicleInWorkshop'])->orderByDesc('id')->where('user_id', '=', Auth::user()->id)->get();
            return view('admin.workshop.index', compact(['assigned_vehicles']));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        dd($id);
        try {
            AssignedEmployee::create([
                'user_id' => $request->user()->id,
                'vehicle_in_workshop_id' => $id,
            ]);

            return redirect()->route('assign.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function releaseVehicle(string $id)
    {
        try {

            $current_vehicle = VehicleInWorkshop::findOrFail($id);

            if ($current_vehicle->check_out_date != null) {
                return redirect()->route('assign.index');
            }
            $current_vehicle->check_out_date = now();
            $current_vehicle->save();
            return redirect()->route('assign.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function assignedEmployee(Request $request)
    {
        try {

            $query = AssignedEmployee::query();
            $search = $request->input('search', '');

            if (!empty($search)) {
                $query->with(['user:id,name,email,dni,phone_number,role', 'vehicleInWorkshop'])
                    ->where(function ($q) use ($search) {
                        $q->whereHas('user', function ($q) use ($search) {
                            // Search only in the 'user' relation
                            $q->where('name', 'LIKE', "%$search%")
                                ->orWhere('email', 'LIKE', "%$search%")
                                ->orWhere('dni', 'LIKE', "%$search%")
                                ->orWhere('phone_number', 'LIKE', "%$search%");
                        })->orWhereHas('vehicleInWorkshop', function ($q) use ($search) {
                                // Search only in the 'vehicleInWorkshop' relation
                                $q->where('license_plate', 'LIKE', "%$search%")
                                    ->orWhere('name', 'LIKE', "%$search%")
                                    ->orWhere('email', 'LIKE', "%$search%")
                                    ->orWhere('brand', 'LIKE', "%$search%")
                                    ->orWhere('check_in_date', 'LIKE', "%$search%")
                                    ->orWhere('check_out_date', 'LIKE', "%$search%");
                            });
                    });
            }
            $query->orderByDesc("id");
            $assigned_employees = $query->paginate(5);

            return view("admin.registerVehicle.assigned-employees", compact('assigned_employees', 'search'));
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
