<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterVehicleStoreUpdateRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:15',
            'vehicle' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'license_plate' => 'required|string|max:20',
            'year' => 'required|integer|min:1900|max:' . (date('Y')),
            'description' => 'nullable|string|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre es obligatorio.',
            'name.string' => 'El nombre debe ser una cadena de texto.',
            'name.max' => 'El nombre no debe exceder los 255 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no es válido.',
            'email.max' => 'El correo electrónico no debe exceder los 255 caracteres.',

            'phone_number.required' => 'El número de teléfono es obligatorio.',
            'phone_number.string' => 'El número de teléfono debe ser una cadena de texto.',
            'phone_number.max' => 'El número de teléfono no debe exceder los 15 caracteres.',

            'vehicle.required' => 'El tipo de vehículo es obligatorio.',
            'vehicle.string' => 'El tipo de vehículo debe ser una cadena de texto.',
            'vehicle.max' => 'El tipo de vehículo no debe exceder los 255 caracteres.',

            'brand.required' => 'La marca es obligatoria.',
            'brand.string' => 'La marca debe ser una cadena de texto.',
            'brand.max' => 'La marca no debe exceder los 255 caracteres.',

            'license_plate.required' => 'La patente es obligatoria.',
            'license_plate.string' => 'La patente debe ser una cadena de texto.',
            'license_plate.max' => 'La patente no debe exceder los 20 caracteres.',

            'year.required' => 'El año es obligatorio.',
            'year.integer' => 'El año debe ser un número entero.',
            'year.min' => 'El año debe ser mayor o igual a 1900.',
            'year.max' => 'El año no puede ser mayor al año actual.',

            'description.string' => 'La descripción debe ser una cadena de texto.',
            'description.max' => 'La descripción no debe exceder los 1000 caracteres.',
        ];
    }
}
