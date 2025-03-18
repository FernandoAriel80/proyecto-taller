<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'dni' => 'required|digits:8|unique:users',
            'phone_number' => 'required|string|regex:/^[0-9]{10}$/',
            'password' => 'required|min:8|confirmed',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es obligatoria.',
            'email.required' => 'El correo es obligatoria.',
            'email.unique' => 'El correo ya está registrada.',
            'dni.required' => 'El dni es obligatoria.',
            'dni.unique' => 'El dni ya está registrada.',
            'dni.digits' => 'El dni tiene que tener 8 caracteres.',
            'phone_number.required' => 'El campo número de teléfono es obligatorio.',
            'phone_number.string' => 'El número de teléfono debe ser una cadena de texto.',
            'phone_number.regex' => 'El número de teléfono debe tener exactamente 10 dígitos y tiene que ser numero.',
            'password.required' => 'La clave es obligatoria.',
            'password.min' => 'La clave tiene que tener 8 digitos como minimo.',
            'password.confirmed' => 'Las claves no coinciden.',
        ];
    }
}
