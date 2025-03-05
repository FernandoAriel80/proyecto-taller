<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        /* $reservations = Reservation::with(['user', 'vehicle'])->orderByDesc("id")->get();
        return view('admin.reservations.index', compact('reservations')); */
        $query = Reservation::query();
        $search = $request->input('search', '');

        $query->with(['user', 'vehicle']);

        if (!empty($search)) {
            // Verificamos si el usuario ingresó la fecha en formato DD-MM-YYYY
            if (preg_match('/\d{2}-\d{2}-\d{4}/', $search)) {
                $formattedDate = Carbon::createFromFormat('d-m-Y', $search)->format('Y-m-d');
                $query->whereDate('date', $formattedDate);
            } else {
                $query->where(function ($q) use ($search) {
                    // Filtrar por nombre del usuario
                    $q->orWhereHas('user', function ($userQuery) use ($search) {
                        $userQuery->where('name', 'LIKE', "%$search%")
                            ->orWhere('dni', 'LIKE', "%$search%");
                    });
                    // Filtrar por patente del vehículo
                    $q->orWhereHas('vehicle', function ($vehicleQuery) use ($search) {
                        $vehicleQuery->where('license_plate', 'LIKE', "%$search%");
                    });
                });
            }
        }
        $query->orderByDesc("id");
        $reservations = $query->paginate(1);
        return view('admin.reservations.index', compact('reservations', 'search'));
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
