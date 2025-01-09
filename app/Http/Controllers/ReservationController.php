<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Reservation;
use App\Models\Vehicle;
use App\Models\VehicleType;
use Carbon\Carbon;
use Illuminate\Http\Request;


class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return redirect("dashboard");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function showVehicleData( Request $request)
    {
        // vehicle
        $brands = Brand::all();
        $vehicle_types = VehicleType::all();
        $vehicles = Vehicle::with('brand')->where("user_id",$request->user()->id)->get();
        $vehicle = Vehicle::where("user_id",$request->user()->id)->orderByDesc("id")->first();
        
        if ($request->has('vehicle_id')) {
            $vehicle = Vehicle::where("user_id",$request->user()->id)->find($request->vehicle_id);
        }

        $availableDates = [];
        $availableDates = $this->getAvailableDates();
        return view('reserve.index', compact(['brands','vehicle_types','vehicle','vehicles','availableDates']));
    }

    private function getAvailableDates()
{
    $availableDates = [];
    $startDate = Carbon::now(); 
    $endDate = Carbon::now()->addMonth(); 

    $reservations = Reservation::select('date', 'time')->get();
    
    $reservationsOccupied = $reservations->map(function ($reservation) {
        return $reservation->date . ' ' . $reservation->time;
    });

    while ($startDate <= $endDate) {
        if ($startDate->isWeekday()) {
            $dateFormat = $startDate->format('Y-m-d');
            foreach (range(10, 16) as $time) {
               if ($startDate->now()) {
                    $fullHour = str_pad($time, 2, '0', STR_PAD_LEFT) . ':00'. ':00';
                    if (!$reservationsOccupied->contains($dateFormat . ' ' . $fullHour)) {
                        $availableDates[] = [
                            'date' => $dateFormat,
                            'time' => $fullHour,
                        ];
                    }
               }
            }
        }

        $startDate->addDay();
    }

    return $availableDates;
}
 

     public function saveVehicleData(Request $request)
    {
        // Validar los datos
        $validatedData = $request->all();
        $validatedData = $request->validate([
            'license_plate' => 'required|unique:vehicles|max:10',
            'model' => 'required|string|max:50',
            'year' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'brand' => 'required|string',
            'vehicle_type' => 'required|integer|max:50',
        ],
       [
            'license_plate.required' => 'La patente es obligatoria.',
            'license_plate.unique' => 'La patente ya está registrada.',
            'license_plate.max' => 'La patente no puede superar los 10 caracteres.',
            'model.required' => 'El modelo es obligatorio.',
            'year.required' => 'El año es obligatorio.',
            'year.integer' => 'El año debe ser un número entero.',
            'year.digits' => 'El año debe tener 4 dígitos.',
            'year.min' => 'El año no puede ser anterior a 1900.',
            'year.max' => 'El año no puede ser mayor al actual.',
            'brand.required' => 'La marca es obligatoria.',
            'vehicle_type.required' => 'El tipo de vehículo es obligatorio.',
        ]);
        // Guardar los datos en la base de datos
        Vehicle::create([
            'license_plate'=> $validatedData['license_plate'],
            'model'=> $validatedData['model'],
            'year'=> $validatedData['year'],
            'brand_id'=> $validatedData['brand'],
            'vehicle_type_id'=> $validatedData['vehicle_type'],
            'user_id' => $request->user()->id
            
        ]);

        return redirect()->back()->with('success', 'El vehículo ha sido registrado exitosamente.');
    }

    public function saveReserveData(Request $request){

        $datetime[] = explode(' ', $request->datetime); 
        $arrayAux = ['date' => $datetime[0][0], 'time' => $datetime[0][1]];
        $request->validate([
            'description' => 'required|string|max:255',
            'vehicle_id' => 'required|string',
        ]);
    
        Reservation::create([
            'date' => $arrayAux['date'],
            'time' => $arrayAux['time'],
            'description' => $request->description,
            'user_id' => $request->user()->id,
            'vehicle_id' => $request->vehicle_id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Turno reservado con éxito.');
    }

}
