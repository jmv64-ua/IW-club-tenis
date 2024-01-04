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
}