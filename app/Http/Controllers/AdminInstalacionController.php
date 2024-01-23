<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reserva;
use App\Models\Instalacion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AdminInstalacionController extends Controller
{
    public function index()
    {
        $instalaciones = Instalacion::all();
        return view('admin.instalaciones.index', compact('instalaciones'));
    }

    public function create()
    {
        return view('admin.instalaciones.create');
    }

    public function store(Request $request)
    {
        $this->validateInstalacion($request);

        $instalacion = new Instalacion($request->all());
        $instalacion->save();

        return redirect()->route('admin.instalaciones.index')->with('success', 'Instalación creada correctamente.');
    }

    public function show($id)
    {
        $instalacion = Instalacion::findOrFail($id);
        return view('admin.instalaciones.show', compact('instalacion'));
    }

    public function edit($id)
    {
        $instalacion = Instalacion::findOrFail($id);
        return view('admin.instalaciones.edit', compact('instalacion'));
    }

    public function update(Request $request, $id)
    {
        // Validar los nuevos datos antes de la actualización
        $this->validateInstalacion($request, $id);
    
        try {
            // Encontrar el usuario
            $instalacion = Instalacion::findOrFail($id);
    
            // Actualizar el usuario con los nuevos datos
            $instalacion->update($request->all());
    
            // Redireccionar a la lista de usuarios con un mensaje de éxito
            return redirect()->route('admin.instalaciones.index')->with('success', 'Instalación actualizada correctamente.');
        } catch (\Exception $e) {
            // En caso de error, redireccionar con un mensaje de error
            return redirect()->route('admin.instalaciones.edit', $id)->with('error', 'Error al actualizar la instalación. Por favor, verifica los datos e inténtalo de nuevo.');
        }
    }

    public function destroy($id)
    {
        $instalacion = Instalacion::findOrFail($id);
        $instalacion->delete();

        return redirect()->route('admin.instalaciones.index')->with('success', 'Instalación eliminada correctamente.');
    }

    private function validateInstalacion(Request $request, $instalacionId = null)
    {
        $rules = [
            'tipo_instalacion' => 'required|string|max:255',
            'aforo' => 'required|numeric',
            'bloqueado' => 'required|boolean',
            'urlphoto' => 'nullable|string',
        ];
    
        $messages = [
            'rol.in' => 'El campo Rol debe ser uno de: administrador, socio, monitor, recepcionista.',
        ];
    
        $request->validate($rules, $messages);
    }
}
