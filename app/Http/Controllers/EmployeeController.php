<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeStoreRequest;
use App\Http\Requests\EmployeeUpdateRequest;
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
    public function store(EmployeeStoreRequest $request)
    {

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
    public function update(EmployeeUpdateRequest $request, string $id)
    {

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
        dd($id);
        $employee = User::findOrFail($id);

        $employee->delete();

        return redirect(route("employee.index"))->with("success", "Usuario se elimino correctamente");
    }
}
