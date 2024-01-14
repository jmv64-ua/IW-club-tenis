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
        // En tu controlador
    public function AsignarActividad(Request $request) {
        // Obtén la fecha de la cadena de consulta
        $fecha = $request->input('fecha');

        // Haz lo que necesites con la fecha (puedes realizar operaciones adicionales o redirigir a otra vista)
        // ...

        // Ejemplo de redirección a una vista
        return view ('actividadAsignar',[
            'fecha' => $fecha
        ]);
    }

}