<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssignedEmployee;
use App\Models\EmployeeReport;
use App\Models\VehicleInWorkshop;
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
        try {
            
            $request->validate([
                'message_report' => 'nullable|string|max:500'
            ]);
            $id = $request->input("current_id");
            
            $update_id = $request->input("update_id");

            if ($update_id) {
                $report = EmployeeReport::findOrFail($update_id);
                $report->description = $request->message_report;
                $report->save();
                
                return redirect()->route('workshop.employee.report.show', compact(['id']));
            }else{
                $report = new EmployeeReport();
                $report->create([
                    'assigned_employee_id' => $id,
                    'description' => $request->message_report,
                ]);
    
                return redirect()->route('workshop.employee.report.show', compact(['id']));
            }
           
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $response_report = AssignedEmployee::with(['employeeReport'])->findOrFail($id);
            $report = $response_report->employeeReport->first();
            return view('admin.workshop.assignedVehicle.employee-report', compact(['report', 'id']));
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
