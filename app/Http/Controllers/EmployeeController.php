<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $message = "error";
        $query = User::query();
        $search = $request->input('search', '');
        
        $query->where("role", "=", "admin");

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('id', 'LIKE', "%$search%")
                    ->orWhere('name', 'LIKE', "%$search%")
                    ->orWhere('dni', 'LIKE', "%$search%");
            });
        }

        $employees = $query->paginate(5);

        return view("admin.employee.index", compact('employees', 'search', 'message'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = User::where("role", "=", "admin");
        return view("admin.employee.index")->with("employees", $employees);
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
        ], [
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
            'phone_number' => $request->phone_number,
            'role' => 'admin',
            'password' => Hash::make($request->password)
        ]);
        return redirect()->route('employee.index')->with('success', 'Usuario creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = User::findOrFail($id);
        return view("admin.employee.edit", compact('employee'));
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
        ], [
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

        $employee = User::findOrFail($id);
        $employee->update([
            'name' => $request->name,
            'email' => $request->email != $employee->email ? $request->email : $employee->email,
            'dni' => $request->dni != $employee->dni ? $request->dni : $employee->dni,
            'phone_number' => $request->phone_number != $employee->phone_number ? $request->phone_number : $employee->phone_number,
            'password' => $request->password ?? Hash::make($request->password)
        ]);

        return redirect(route("employee.index"))->with("success", "Usuario se actualizo correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = User::findOrFail($id);

        $employee->delete();

        return redirect(route("employee.index"))->with("success", "Usuario se elimino correctamente");
    }
}
