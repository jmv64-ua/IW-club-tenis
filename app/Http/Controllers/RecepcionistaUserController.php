<?php


// app/Http/Controllers/RecepcionistaUserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RecepcionistaUserController extends Controller
{
    public function index()
    {
        $users = User::all(); // Obtén todos los usuarios (puedes ajustar según tus necesidades)
        return view('recepcionista.users.index', compact('users'));
    }

    public function create()
    {
        return view('recepcionista.users.create');
    }

    public function store(Request $request)
    {
        $this->validateUser($request);

        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('recepcionista.users.index')->with('success', 'Usuario creado correctamente.');
    }

    // ...

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
        ];
    
        $messages = [
            'rol.in' => 'El campo Rol debe ser uno de: administrador, socio, monitor, recepcionista.',
        ];
    
        $request->validate($rules, $messages);
    }
}
