<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssignedEmployee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       /*  try {
            $report = AssignedEmployee::with(['employeeReport'])->orderByDesc('id')->where('user_id','=',Auth::user()->id)->first();
            return view('admin.workshop.employee-report',compact(['report']));
        } catch (\Throwable $th) {
            throw $th;
        } */
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
        $id = $request->input("current_id");
        dd($id);
        //DD($request->message_report);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $report = AssignedEmployee::with(['employeeReport'])->orderByDesc('id')->where('vehicle_in_workshop_id','=',$id)->first();
            return view('admin.workshop.assignedVehicle.employee-report',compact(['report', 'id']));
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
