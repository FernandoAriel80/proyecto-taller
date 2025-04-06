<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\AssignedEmployee;
use App\Models\EmployeeNote;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index( Request $request )
    {
        $reservations = Reservation::with(['user','vehicle'])->where("user_id", $request->user()->id)->orderByDesc("id")->get();   
        return view('followUp.reservations.index',compact('reservations'));
    }

    public function details( Request $request ){
        $details_vehicles = AssignedEmployee::with('vehicleInWorkshop')
        ->whereHas('vehicleInWorkshop', function ($q) {
            $q->where('phone_number', Auth::user()->phone_number );
        })
        ->orderByDesc('id')
        ->get();

    return view("followUp.details.index", compact('details_vehicles'));
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
            $in_workshop = AssignedEmployee::with(['vehicleInWorkshop'])->orderByDesc('id')->findOrFail($id);
            return view("followUp.details.inWorkshop.general-data",compact(['in_workshop']));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function report(string $id){
        try {
            $response_report = AssignedEmployee::with(['employeeReport'])->findOrFail($id);
            $report = $response_report->employeeReport->first();
            return view('followUp.details.inWorkshop.report', compact(['report', 'id']));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function notes(string $id){
        try {
            $notes = EmployeeNote::where('assigned_employee_id', '=', $id)->orderByDesc('id')->get();
            return view('followUp.details.inWorkshop.note', compact(['id', 'notes']));
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
