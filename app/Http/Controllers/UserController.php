<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.employee.index")->with("message" , "error");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'dni' => 'required|digits:8|unique:users',
            'password' => 'required|min:8|confirmed',
        ],[
            'name.required' => 'El nombre es obligatoria.',
            'email.required' => 'El correo es obligatoria.',
            'email.unique' => 'El correo ya está registrada.',
            'dni.required' => 'El dni es obligatoria.',
            'dni.unique' => 'El dni ya está registrada.',
            'dni.digits' => 'El dni tiene que tener 8 caracteres.',
            'password.required' => 'La clave es obligatoria.',
            'password.min' => 'La clave tiene que tener 8 digitos como minimo.',
            'password.confirmed' => 'Las claves no coinciden.',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'dni' => $request->dni,
            'role' => 'admin',
            'password' => bcrypt($request->password)
        ]);
        return redirect()->route('employee.index')->with('success', 'Usuario creado correctamente');
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
