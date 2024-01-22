<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use App\Models\User;
use App\Models\Actividad;

class ReservaController extends Controller {
    public function reservar($id) {
        try {
            $user = auth()->user();

    
            // Crea una nueva reserva con los atributos adicionales
            $reserva = new Reserva([
                'fecha_alta' => now(),
                'fecha_reserva' => now(),
            ]);

            $reserva->user_id = auth()->id();

            // Asigna el usuario a la reserva
            $reserva->user()->associate($user);

            $reserva->actividad_id = $id;

            // Obtén la actividad asociada a la reserva
            $actividad = Actividad::find($id);
    
            if ($actividad) {
                // Obtén la instalación asociada a la actividad
                $instalacion = $actividad->instalacion;
    
                if ($instalacion && $instalacion->aforo > 0) {
                    // Decrementa el aforo de la instalación en uno
                    $instalacion->decrement('aforo', 1);
    
                    // Guarda la reserva en la base de datos
                    $user->reservas()->saveMany([$reserva]);
    
                    return response()->json(['message' => 'Reserva confirmada exitosamente']);
                } else {
                    return response()->json(['message' => 'No hay suficiente aforo en la instalación']);
                }
            } else {
                return response()->json(['error' => 'Actividad no encontrada'], 404);
            }

    
            return response()->json(['message' => 'Reserva confirmada exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function historialReservas(User $user)
    {
         // Obtén el usuario autenticado
         $user = auth()->user();

         $reservas = $user->reservas()->with('actividad')->get();

        return view('historialReservas', compact('reservas'));
    }

}