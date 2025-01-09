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
        // reserva
        //$today = now()->setTimezone('America/Argentina/Buenos_Aires')->toDateString();
        //$futureDate = now()->setTimezone('America/Argentina/Buenos_Aires')->addDays(30)->toDateString();
        $fechasHorasDisponibles = [];
        $fechasHorasDisponibles = $this->obtenerFechasDisponibles();
        //dd($fechasHorasDisponibles);
        return view('reserve.index', compact(['brands','vehicle_types','vehicle','vehicles','fechasHorasDisponibles']));
        //return view('reserve.index', compact(['brands','vehicle_types','vehicle','vehicles','today','futureDate']));
    }

    // Función para obtener las fechas disponibles
 /*    private function obtenerFechasDisponibles()
    {
        $fechasDisponibles = [];
        $fechaInicio = Carbon::now(); // Fecha actual
        $fechaFin = Carbon::now()->addMonth(); // Fecha dentro de un mes

        // Iteramos desde la fecha actual hasta la fecha fin
        while ($fechaInicio <= $fechaFin) {
            // Excluimos sábados (6) y domingos (7)
            if ($fechaInicio->isWeekday()) {
                $fechasDisponibles[] = $fechaInicio->format('Y-m-d');
            }
            $fechaInicio->addDay();
        }

        return $fechasDisponibles;
    } */

    /* private function obtenerFechasDisponibles()
    {
        $fechasDisponibles = [];
        $fechaInicio = Carbon::now(); // Fecha actual
        $fechaFin = Carbon::now()->addMonth(); // Fecha dentro de un mes
        // Obtener todas las fechas y horas reservadas
        $reservas = Reservation::select('date', 'time')->get();
        // Crear una colección de fechas y horas reservadas para comparación
        $reservasOcupadas = $reservas->map(function ($reserva) {
            return $reserva->date . ' ' . $reserva->time;
        });
        // Iterar desde la fecha actual hasta la fecha fin
        while ($fechaInicio <= $fechaFin) {
            // Excluir sábados (6) y domingos (7)
            if ($fechaInicio->isWeekday()) {
                $fechaFormato = $fechaInicio->format('Y-m-d');
                // Agregar todas las horas disponibles (10:00 a 16:00) si no están reservadas
                foreach (range(10, 16) as $hora) {
                    $horaCompleta = str_pad($hora, 2, '0', STR_PAD_LEFT) . ':00';
                    // Verificar si esta combinación de fecha y hora no está reservada
                    if (!$reservasOcupadas->contains($fechaFormato . ' ' . $horaCompleta)) {
                        $fechasDisponibles[] = [
                            'date' => $fechaFormato,
                            'time' => $horaCompleta,
                        ];
                    }
                }
            }
            $fechaInicio->addDay();
        }
        return $fechasDisponibles;
    }
 */
private function obtenerFechasDisponibles()
{
    $fechasDisponibles = [];
    $horasDisponibles = [];
    $fechaInicio = Carbon::now(); // Fecha actual
    $fechaFin = Carbon::now()->addMonth(); // Fecha dentro de un mes

    // Obtener todas las reservas ocupadas
    $reservas = Reservation::select('date', 'time')->get();

    // Crear una colección de fechas y horas reservadas
    $reservasFechas = $reservas->pluck('date')->unique();
    $reservasHoras = $reservas->pluck('time')->unique();
    //dd($reservasHoras);

    // Iterar desde la fecha actual hasta la fecha fin
    while ($fechaInicio <= $fechaFin) {
        if ($fechaInicio->isWeekday()) { // Excluimos fines de semana
            $fechaFormato = $fechaInicio->format('Y-m-d');

            // Si la fecha no está reservada, la agregamos
            if (!$reservasFechas->contains($fechaFormato)) {
                $fechasDisponibles[] = $fechaFormato;
            }
        }
        $fechaInicio->addDay();
    }

    // Generar las horas disponibles
    foreach (range(9, 17) as $hora) { // Horas de 9 AM a 5 PM
        $horaCompleta = str_pad($hora, 2, '0', STR_PAD_LEFT) . ':00';

        // Si la hora no está reservada, la agregamos
        if (!$reservasHoras->contains($horaCompleta)) {
            $horasDisponibles[] = $horaCompleta;
        }
    }

    return [
        'fechasDisponibles' => $fechasDisponibles,
        'horasDisponibles' => $horasDisponibles,
    ];
}

    /**
     * Store a newly created resource in storage.
     */
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

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'El vehículo ha sido registrado exitosamente.');
    }

    public function saveReserveData(Request $request){
       // Validar que la fecha y hora no se repitan
        /* $request->validate([
            'date' => 'required|date|after_or_equal:' . now()->format('Y-m-d') . '|before_or_equal:' . now()->addDays(30)->format('Y-m-d') .
                      '|unique:reservations,date,'.$request->time.',time',  // Validación de unicidad
            'time' => 'required|date_format:H:i|between:09:00,18:00',
            'description' => 'required|string|min:10|max:255',
            'vehicle_id' => 'required|integer',
        ], [
            'date.required' => 'La fecha es obligatoria.',
            'date.date' => 'La fecha no es válida.',
            'date.after_or_equal' => 'La fecha debe ser igual o posterior a hoy.',
            'date.before_or_equal' => 'La fecha debe ser igual o anterior a los próximos 30 días.',
            'date.unique' => 'Ya existe una reserva para esta fecha y hora.', // Mensaje de error personalizado
            'time.required' => 'La hora es obligatoria.',
            'time.date_format' => 'La hora debe tener el formato HH:mm.',
            'time.between' => 'La hora debe estar entre las 09:00 y las 18:00.',
            'description.required' => 'La descripción es obligatoria.',
            'description.string' => 'La descripción debe ser un texto.',
            'description.min' => 'La descripción debe tener al menos 10 caracteres.',
            'description.max' => 'La descripción no puede superar los 255 caracteres.',
        ]); */
        //return redirect()->back()->with('success', 'Reserva guardada con éxito'); 
        
        $request->validate([
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'description' => 'required|string|max:255',
            'vehicle_id' => 'required|string',
        ]);
        
        //return dd($request);
        // Guardar el turno en la base de datos
        Reservation::create([
            'date' => $request->date,
            'time' => $request->time,
            'description' => $request->description,
            'user_id' => $request->user()->id,
            'vehicle_id' => $request->vehicle_id,
        ]);

        // Redirigir con mensaje de éxito
        return redirect()->back()->with('success', 'Turno reservado con éxito.');
    }

}
