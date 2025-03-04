<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservations = Reservation::with(['user', 'vehicle'])->get();
        return view('admin.reservations.index', compact('reservations'));
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) {}

    /**
     * Update the specified resource in storage.
     */
    public function confirmed(string $id)
    {
        try {
            $reservation = Reservation::findOrFail($id);
            $reservation->is_confirmed = 1;
            $reservation->save(); 
            return redirect()->route('reservations.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function decline(string $id)
    {
        try {
            $reservation = Reservation::findOrFail($id);
            $reservation->is_confirmed = 0;
            $reservation->save(); 
            return redirect()->route('reservations.index');
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
