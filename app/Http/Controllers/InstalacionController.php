<?php
// app/Http/Controllers/InstalacionController.php

namespace App\Http\Controllers;

use App\Models\Instalacion;

class InstalacionController extends Controller
{
    public function index()
    {
        $instalaciones = Instalacion::all();

        return view('instalaciones.index', compact('instalaciones'));
    }

    public function show($id)
    {
        $instalacion = Instalacion::findOrFail($id);

        return view('instalaciones.show', compact('instalacion'));
    }
}

