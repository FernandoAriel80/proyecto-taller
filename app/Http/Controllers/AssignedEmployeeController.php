<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssignedEmployee;
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
            $assigned_employee = AssignedEmployee::with(['vehicleInWorkshop'])->orderByDesc('id')->where('user_id','=',Auth::user()->id)->get();

            return view('admin.workshop.index',compact(['assigned_employee']));
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
        try {
            AssignedEmployee::create([
                'user_id' => $request->user()->id,
                'vehicle_in_workshop_id' => $request->vehicle_in_workshop_id,
            ]);

            return redirect()->route('assign.index');
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
