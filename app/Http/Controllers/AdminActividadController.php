<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reserva;
use App\Models\Actividad;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AdminActividadController extends Controller
{
    public function index()
    {
        $actividades = Actividad::all();
        return view('admin.actividades.index', compact('actividades'));
    }

    public function create()
    {
        return view('admin.actividades.create');
    }

    public function store(Request $request)
    {
        $this->validateActividad($request);

        $actividad = new Actividad($request->all());
        $actividad->save();

        return redirect()->route('admin.actividades.index')->with('success', 'Actividad creada correctamente.');
    }

    public function show($id)
    {
        $actividad = Actividad::findOrFail($id);
        return view('admin.actividades.show', compact('actividad'));
    }

    public function edit($id)
    {
        $actividad = Actividad::findOrFail($id);
        return view('admin.actividades.edit', compact('actividad'));
    }

    public function update(Request $request, $id)
    {
        // Validar los nuevos datos antes de la actualización
        $this->validateActividad($request, $id);
    
        try {
            // Encontrar el usuario
            $actividad = Actividad::findOrFail($id);
    
            // Actualizar el usuario con los nuevos datos
            $actividad->update($request->all());
    
            // Redireccionar a la lista de usuarios con un mensaje de éxito
            return redirect()->route('admin.actividades.index')->with('success', 'Actividad actualizada correctamente.');
        } catch (\Exception $e) {
            // En caso de error, redireccionar con un mensaje de error
            return redirect()->route('admin.actividades.edit', $id)->with('error', 'Error al actualizar la actividad. Por favor, verifica los datos e inténtalo de nuevo.');
        }
    }

    public function destroy($id)
    {
        $actividad = Actividad::findOrFail($id);
        $actividad->delete();

        return redirect()->route('admin.actividades.index')->with('success', 'Actividad eliminada correctamente.');
    }

    private function validateActividad(Request $request, $actividadId = null)
    {
        $rules = [
            'instalacion_id' => 'nullable|numeric',
            'user_id' => 'nullable|numeric',
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'descripcion' => 'required|string|max:255',
            'fechaI' => 'required|date',
            'fechaFin' => 'required|date',
            'urlphoto' => 'nullable|string',
        ];
    
        $messages = [
            'rol.in' => 'El campo Rol debe ser uno de: administrador, socio, monitor, recepcionista.',
        ];
    
        $request->validate($rules, $messages);
    }
}
