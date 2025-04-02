<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeNoteStoreRequest extends FormRequest
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
            'text_note' => 'required|string|max:500',
            'image' => 'required|file|mimes:jpg,png,jpeg|max:2048' // 2MB limit
        ];
    }

    public function messages():array
    {
        return [
            'text_note.required' => 'El campo de nota es obligatorio.',
            'text_note.string' => 'La nota debe ser un texto.',
            'text_note.max' => 'La nota no puede tener más de 500 caracteres.',
            
            'image.required' => 'Es necesario subir una imagen.',
            'image.file' => 'El archivo debe ser una imagen válida.',
            'image.mimes' => 'Solo se permiten imágenes en formato JPG, PNG o JPEG.',
            'image.max' => 'La imagen no puede superar los 2MB.'
        ];
    }
}
