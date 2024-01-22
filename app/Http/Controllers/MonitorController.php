<?php

namespace App\Http\Controllers;

use App\Models\Actividad;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MonitorController extends Controller {
    public function index() {
        $monitores = DB::table('users')->where('rol', '=', 'monitor')->get();

        return view('monitores.index', compact('monitores'));
    }

    public function show($id) {
        $monitor = User::findOrFail($id);

        return view('monitores.show', compact('monitor'));
    }

    public function calendario($id)
    {
        $monitor = User::findOrFail($id);

        // Obtener las actividades asociadas al monitor
        $actividades = Actividad::where('user_id', $id)->get();

        return view('monitores.calendario', compact('monitor', 'actividades'));
    }
}
