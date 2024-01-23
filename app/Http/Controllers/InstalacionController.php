<?php
// app/Http/Controllers/InstalacionController.php

namespace App\Http\Controllers;

use App\Models\Instalacion;
use App\Models\Actividad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InstalacionController extends Controller
{
    public function index()
    {
        $instalaciones = Instalacion::all();

        return view('instalaciones.index', compact('instalaciones'));
    }
    public function indexAdmin()
    {
        $instalaciones = Instalacion::all();

       
        return view('instalaciones.InstalacionesAdmin', compact('instalaciones'));
    }
    public function bloquear($id) {
        // Verificar si el usuario está autenticado (comentado por ahora)
        /*
        if (!auth()->check()) {
            return redirect()->route('login');
        }
    
        $admin = Auth::user()->admin;
    
        // Verificar si el usuario es un administrador (comentado por ahora)
        if ($admin == true) {
        */
    
        // Encontrar la instalación por ID
        $instalacion = Instalacion::find($id);
    
        // Verificar si se encontró la instalación
        if (!$instalacion) {
            return redirect()->back()->with('error', 'Instalación no encontrada');
        }
    
        // Cambiar el estado de "bloqueado"
        $instalacion->bloqueado = !$instalacion->bloqueado;
    
        // Guardar los cambios
        $instalacion->save();
    
        // Redirigir de nuevo con un mensaje de éxito
        return redirect()->back()->with('mensaje', 'El objeto ha sido bloqueado/desbloqueado correctamente');
    
        // Cierre del bloque de comentarios para verificar autenticación y administrador
        /*
        }
        return redirect()->route('login');
        */
    }
    

    public function show($id)
    {
        $instalacion = Instalacion::findOrFail($id);

        return view('instalaciones.show', compact('instalacion'));
    }

    // Recibe la id de la instalación
    public function asignarActividad($id_instalacion, $id_actividad) {
        $actividad = Actividad::find($id_actividad);

        $actividad->instalacion_id = $id_instalacion;
        $actividad->save();

        $instalaciones = Instalacion::all();

        return view('instalaciones.index', compact('instalaciones'));
    }

    public function ReservasInstalaciones()
    {
        if(Auth::check()){
            return view ('reservasInstalaciones');
        }else{
            return redirect()->route('login');
        }
    }

    public function AsignarInstalacion(Request $request)
    {
        // Obtener la fecha del request (puedes manejar esto según tus necesidades)
        $fecha = $request->input('fecha');

        // Obtener todas las instalaciones desde la base de datos
        $instalaciones = Instalacion::all();

        // Retornar la vista con las instalaciones
        return view('asignarInstalacion', compact('instalaciones', 'fecha'));
    }
}

