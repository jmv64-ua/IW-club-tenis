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
        // Validar los nuevos datos antes de la actualización
        $this->validateUser($request, $id);
    
        try {
            // Encontrar el usuario
            $user = User::findOrFail($id);
    
            // Actualizar el usuario con los nuevos datos
            $user->update($request->all());
    
            // Redireccionar a la lista de usuarios con un mensaje de éxito
            return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado correctamente.');
        } catch (\Exception $e) {
            // En caso de error, redireccionar con un mensaje de error
            return redirect()->route('admin.users.edit', $id)->with('error', 'Error al actualizar el usuario. Por favor, verifica los datos e inténtalo de nuevo.');
        }
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Usuario eliminado correctamente.');
    }

    public function validar($id) 
    {
        $user = User::findOrFail($id);
        $user->Validado = true;

        $user->save();

        return redirect()->route('admin.users.index')->with('success', 'Usuario actualizado correctamente.');
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
            'password' => 'nullable|string|min:8', // Permitir contraseña nula o con al menos 8 caracteres
            'saldo' => 'required|numeric',
            'direccion' => 'required|string|max:255',
            'codigo_postal' => 'required|string|max:20',
            'telefono' => 'required|string|max:20',
            'rol' => 'required|in:administrador,socio,monitor,recepcionista',
            'Validado' => 'required|boolean',
            'descripcion' => 'nullable|string',
            'bloqueado' => 'required|boolean',
            'resumen' => 'nullable|string',
            'urlphoto' => 'nullable|string',
        ];
    
        $messages = [
            'rol.in' => 'El campo Rol debe ser uno de: administrador, socio, monitor, recepcionista.',
        ];
    
        $request->validate($rules, $messages);
    }
    
    
}
