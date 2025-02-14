<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where("role","=","admin")->get();
        $message = "error";
        return view("admin.employee.index", compact(['users','message']));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where("role","=","admin");
       return view("admin.employee.index")->with("users" , $users);
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
            'phone_number' => 'required|string|regex:/^[0-9]{10}$/',
            'password' => 'required|min:8|confirmed',
        ],[
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
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'dni' => $request->dni,
            'role' => 'admin',
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('employee.index')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view("admin.employee.edit",compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email',
            'dni' => 'required|digits:8',
            'phone_number' => 'required|string|regex:/^[0-9]{10}$/',
            'password' => 'nullable|min:8|confirmed',
        ],[
            'name.required' => 'El nombre es obligatoria.',
            'email.required' => 'El correo es obligatoria.',
            'dni.required' => 'El dni es obligatoria.',
            'dni.digits' => 'El dni tiene que tener 8 caracteres.',
            'phone_number.required' => 'El campo número de teléfono es obligatorio.',
            'phone_number.string' => 'El número de teléfono debe ser una cadena de texto.',
            'phone_number.regex' => 'El número de teléfono debe tener exactamente 10 dígitos y tiene que ser numero.',
            'password.required' => 'La clave es obligatoria.',
            'password.min' => 'La clave tiene que tener 8 digitos como minimo.',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email != $user->email ?$request->email:$user->email,
            'dni' => $request->dni != $user->dni ?$request->dni:$user->dni,
            'phone_number' => $request->phone_number != $user->phone_number ?$request->phone_number:$user->phone_number,
            'password' => $request->password ?? Hash::make($request->password)
        ]);

        return redirect(route("employee.index"))->with("success","Usuario se actualizo correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect(route("employee.index"))->with("success","Usuario se elimino correctamente");
    }
}
