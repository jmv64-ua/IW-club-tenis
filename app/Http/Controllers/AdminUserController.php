<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $this->validateUser($request);

        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Usuario creado correctamente.');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $this->validateUser($request, $id);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado correctamente.');
    }

    private function validateUser(Request $request, $userId = null)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($userId),
            ],
            'password' => 'required|string|min:8|confirmed',
            'saldo' => 'required|numeric',
            'direccion' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:20',
            'telefono' => 'required|string|max:20',
        ];

        $request->validate($rules);
    }
}
