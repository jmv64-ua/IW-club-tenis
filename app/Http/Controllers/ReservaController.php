<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\User;
use App\Models\Actividad;
use App\Models\Instalacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservaController extends Controller {
    public function reservar($id) {
        try {
            $user = auth()->user();
            
            // Comprueba si el usuario ya tiene una reserva para esta actividad
            $reservaExistente = Reserva::where('user_id', $user->id)
            ->where('actividad_id', $id)
            ->first();
    
            if ($reservaExistente) {
                return response()->json(['message' => 'Ya tienes una reserva para esta actividad']);
            }
    
            // Crea una nueva reserva con los atributos adicionales
            $reserva = new Reserva([
                'fecha_alta' => now(),
                'fecha_reserva' => now(),
            ]);
    
            $reserva->user_id = auth()->id();
            $reserva->actividad_id = $id;
    
            // Obtén la actividad asociada a la reserva
            $actividad = Actividad::find($id);
    
            if ($actividad) {
                // Comprueba el aforo disponible
                $instalacion = $actividad->instalacion;
                $reservas = Reserva::where('actividad_id', $id)->count();
                $aforoDisponible = $instalacion->aforo - $reservas;
    
                if ($aforoDisponible > 0) {
                    // Comprueba si el usuario tiene suficiente saldo
                    $costoActividad = $actividad->precio;
                    if ($user->saldo >= $costoActividad) {
                        // Resta el costo de la actividad al saldo del usuario
                        $user->saldo -= $costoActividad;
                        $user->save();
    
                        // Guarda la reserva
                        $user->reservas()->save($reserva);
    
                        return response()->json(['message' => 'Reserva confirmada exitosamente']);
                    } else {
                        return response()->json(['message' => 'Saldo insuficiente']);
                    }
                } else {
                    return response()->json(['message' => 'No hay suficiente aforo en la instalación']);
                }
            } else {
                return response()->json(['error' => 'Actividad no encontrada'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    

    public function reservarInstalacion($id, Request $request)
    {
        try {
            $user = auth()->user();
            $fecha = $request->input('fecha');
    
            // Verificar si el usuario ya tiene una reserva para esta instalación
            $reservaInstalacionExistente = Reserva::where('user_id', $user->id)
                ->where('instalacion_id', $id)
                ->first();
    
            if ($reservaInstalacionExistente) {
                return response()->json(['message' => 'Ya tienes una reserva para esta instalación']);
            }
    
            // Verificar si hay reservas existentes en la instalación para la misma hora o las dos horas siguientes
            $reservasExisten = Reserva::where('instalacion_id', $id)
                ->where('fecha_reserva', '>=', $fecha)
                ->where('fecha_reserva', '<=', now()->addHours(2))
                ->exists();
    
            if ($reservasExisten) {
                return response()->json(['message' => 'La instalación ya está reservada en este horario']);
            }
    
            // Obtén la instalación y su costo
            $instalacion = Instalacion::find($id);
            $costoInstalacion = $instalacion->precio; // Asegúrate de que este campo exista y tenga el costo
    
            // Comprueba si el usuario tiene suficiente saldo
            if ($user->saldo < $costoInstalacion) {
                return response()->json(['message' => 'Saldo insuficiente']);
            }
    
            // Resta el costo de la instalación al saldo del usuario y guarda
            $user->saldo -= $costoInstalacion;
            $user->save();
    
            // Crea una nueva reserva con los atributos adicionales
            $reserva = new Reserva([
                'fecha_alta' => now(),
                'fecha_reserva' => $fecha,
                'instalacion_id' => $id,
                'user_id' => auth()->id(),
            ]);
    
            // Guarda la reserva en la base de datos
            $user->reservas()->save($reserva);
    
            return response()->json(['message' => 'Reserva de instalación exitosa']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    

    

    public function historialReservas(User $user)
    {

        if(Auth::check()){
            // Obtén el usuario autenticado
            $user = auth()->user();

            $reservas = $user->reservas()->with('actividad')->get();

            return view('historialReservas', compact('reservas'));
        }else{
            return redirect()->route('login');
        }
    }

}