<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReservationSaveVehicleDataRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'license_plate' => 'required|unique:vehicles|max:10',
            'model' => 'required|string|max:50',
            'current_mileage' => 'required|string|max:50',
            'fuel_type' => 'required|string|max:50',
            'year' => 'required|integer|digits:4|min:1900|max:' . date('Y'),
            'brand' => 'required|string',
            'vehicle_type' => 'required|integer|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'license_plate.required' => 'La patente es obligatoria.',
            'license_plate.unique' => 'La patente ya está registrada.',
            'license_plate.max' => 'La patente no puede superar los 10 caracteres.',
            'model.required' => 'El modelo es obligatorio.',
            'current_mileage.required' => 'La cantidad de millas es obligatorio.',
            'fuel_type.required' => 'El tipo de combustible es obligatorio.',
            'year.required' => 'El año es obligatorio.',
            'year.integer' => 'El año debe ser un número entero.',
            'year.digits' => 'El año debe tener 4 dígitos.',
            'year.min' => 'El año no puede ser anterior a 1900.',
            'year.max' => 'El año no puede ser mayor al actual.',
            'brand.required' => 'La marca es obligatoria.',
            'vehicle_type.required' => 'El tipo de vehículo es obligatorio.',
        ];
    }
}
