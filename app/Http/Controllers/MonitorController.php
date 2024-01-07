<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Monitor;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MonitorController extends Controller {
    public function index() {
        $query = Monitor::query();

        $monitores = $query->paginate(5);

        return view('monitores.list', [
            'monitores' => $monitores
        ]);
    }
}