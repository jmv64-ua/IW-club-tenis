<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Actividad;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ActividadController extends Controller
{
    public function Actividades(){
        $query = Actividad::query();

        $actividades = $query->paginate(5);

        return view ('actividades',[
            'actividades' => $actividades
        ]);
    }
    public function ActividadesCalendario(){
        $query = Actividad::query();

        $actividades = $query->paginate(5);

        $allactivities =[];
        foreach ($actividades as $actividad){
            $allactivities[]=[
                'title' => $actividad->nombre,
                'start' =>  $actividad->fechaI,
                'end' => $actividad->fechaFin,


            ];
        };

        return view ('calendarioadmin',[
            'actividades' => $allactivities
        ]);
    }
    public function Actividad($id){
        $query = Actividad::find($id);

        

        return view ('actividad',[
            'actividad' => $query
        ]);
    }
        // Recibe la petición con los campos del formulario (fecha y plazas) y el ID de la actividad.
    public function AsignarActividad(Request $request, $id) {
        // Obtén la fecha de la cadena de consulta
        $fecha = $request->fecha;
        $plazas = $request->plazas;

        $actividad = Actividad::find($id);

        $calendario = Calendario::create([
            'actividad_id' => $actividad->id,
            'user_id' => $actividad->user_id,
            'fecha' => $fecha,
            'plazas' => $plazas,
        ]);
        
        $actividades = Actividad::all();

        // Ejemplo de redirección a una vista
        return view ('calendarioadmin',[
            'actividades' => $actividades
        ]);
    }

}