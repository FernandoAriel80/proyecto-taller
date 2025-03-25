<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssignedEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        try {
            $assigned_employee = AssignedEmployee::with(['vehicleInWorkshop'])->orderByDesc('id')->findOrFail($id)->get();
            return view('admin.workshop.assignedVehicle.general-data',compact(['assigned_employee']));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $assigned_employee = AssignedEmployee::with(['vehicleInWorkshop'])->orderByDesc('id')->findOrFail($id);
            return view('admin.workshop.assignedVehicle.general-data',compact(['assigned_employee']));
        } catch (\Throwable $th) {
            throw $th;
        }
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
