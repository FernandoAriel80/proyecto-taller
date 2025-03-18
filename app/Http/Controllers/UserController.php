<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
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
    public function store(UserStoreRequest $request)
    {
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
    public function update(UserUpdateRequest $request, string $id)
    {

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
