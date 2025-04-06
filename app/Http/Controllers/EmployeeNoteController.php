<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EmployeeNote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $id)
    {
        try {
            $notes = EmployeeNote::where('assigned_employee_id', '=', $id)->orderByDesc('id')->get();
            return view('admin.workshop.assignedVehicle.employee-note', compact(['id', 'notes']));
        } catch (\Throwable $th) {
            throw $th;
        }
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
        //trate de implementar un request con EmployeeNoteRequest, pero no me tomaba los $requite-input()
        try {
            $request->validate([
                'text_note' => 'required|string|max:500',
                'image' => 'required|file|mimes:jpg,png,jpeg|max:2048'
            ], [
                'text_note.required' => 'El campo de nota es obligatorio.',
                'text_note.string' => 'La nota debe ser un texto.',
                'text_note.max' => 'La nota no puede tener más de 500 caracteres.',

                'image.required' => 'Es necesario subir una imagen.',
                'image.file' => 'El archivo debe ser una imagen válida.',
                'image.mimes' => 'Solo se permiten imágenes en formato JPG, PNG o JPEG.',
                'image.max' => 'La imagen no puede superar los 2MB.'
            ]);


            $id = $request->input("current_id");

            // Get the original file extension
            $extension = $request->file('image')->getClientOriginalExtension();

            // Generate a unique file name (random + timestamp)
            $fileName = 'image_' . uniqid() . '.' . $extension;

            // Store the image with the new name in the `public/images` folder
            $path = $request->file('image')->storeAs('images', $fileName, 'public');

            $note = new EmployeeNote();

            $note->create([
                'assigned_employee_id' => $id,
                'description' => $request->text_note,
                'image_url' => $path,
            ]);

            return redirect()->route('workshop.employee.note.index', compact(['id']));
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
            dd($id);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $employeeNote = EmployeeNote::findOrFail($id);
            return view('admin.workshop.assignedVehicle.templates.update-note-form', compact(['employeeNote']));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'text_note' => 'required|string|max:500',
                'image' => 'nullable|file|mimes:jpg,png,jpeg|max:2048'
            ]);

            $note = EmployeeNote::findOrFail($id);

            $note->description = $request->text_note;

            // If a new image is uploaded
            if ($request->hasFile('image')) {
                // Delete the old image from storage
                if ($note->image_url && Storage::disk('public')->exists($note->image_url)) {
                    Storage::disk('public')->delete($note->image_url);
                }

                // Store the new image
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileName = 'image_' . uniqid() . '.' . $extension;
                $path = $request->file('image')->storeAs('images', $fileName, 'public');

                $note->image_url = $path;
            }

            $note->save();

            return redirect()->route('workshop.employee.note.index', ['id' => $note->assigned_employee_id])
                ->with('success', 'Nota actualizada correctamente');
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
