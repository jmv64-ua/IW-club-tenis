<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\User;
use App\Models\Instalacion;
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
        $monitores = User::where('rol', 'monitor')->get();
        $instalaciones= Instalacion::All();
        $carbonFechaHora = Carbon::parse($fecha);
        $fecha = $carbonFechaHora->toDateString();
        $hora = $carbonFechaHora->toTimeString();



        // Haz lo que necesites con la fecha (puedes realizar operaciones adicionales o redirigir a otra vista)
        // ...

        // Ejemplo de redirección a una vista
        return view ('actividadAsignar',[
            'fecha' => $fecha,
            'hora' => $hora,
            'monitores'=> $monitores,
            'instalaciones' =>$instalaciones
        ]);
    }
    

    public function NuevaActividad(Request $request){
        /*if (!auth()->check()) {
            return redirect()->route('login');
        }
        $admin=Auth::user()->admin;
        if($admin ==false)
            return redirect()->route('login');
        */
        $actividad = new Actividad();
        
       // error_log('Data received: ' . print_r($request, true));
        
        $validator = Validator::make($request->all(), [
            'fecha' => 'required|date',
            'imagen' => 'required',
            'nombre'=>'required',
            'Descripcion' => 'required',
            'Precio' => 'required',
            'monitor' => 'required',
            'instalacion' => 'required',
            'duracion' => 'required',



            // ...
        ]);
        $actividad->nombre = $request->input('nombre');
        $fecha = $request->input('fecha');
        $hora = $request->input('hora');

        // Combina la fecha y la hora en un string
        $fechaHoraString = $fecha . ' ' . $hora;

        // Convierte el string a un objeto Carbon
        $carbonFechaHoraI = Carbon::parse($fechaHoraString);

        // Obtén la duración del formulario (en horas)
        $duracion = $request->input('duracion');

        // Suma la duración al objeto Carbon
        $carbonFechaHoraFin = $carbonFechaHoraI->addHours($duracion);
        
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // script para subir la imagen
        if($request->hasFile("imagen")){
            
            $imagen = $request->file("imagen");
            $nombreimagen = Str::slug($request->name).".".$imagen->guessExtension();
            $ruta = public_path("actividades/");

            //$imagen->move($ruta,$nombreimagen);
            copy($imagen->getRealPath(),$ruta.$nombreimagen);
            

            $actividad->urlphoto ="actividades/".$nombreimagen;
        }
        
        $actividad->fechaI=$carbonFechaHoraI;
        $actividad->fechaFin=$carbonFechaHoraFin;
        
        $actividad->descripcion=$request->input('Descripcion');
        $actividad->precio=$request->input('Precio');
        $actividad->user_id=$request->input('monitor');
        $actividad->instalacion_id=$request->input('instalacion');
        $actividad->save();
        return redirect()->back()->with('mensaje', 'El objeto ha sido creado correctamente');
    }
}