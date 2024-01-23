<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller {
    public function obtenerProductos() {
        $response = Http::get('http://localhost:8080/tiendaropa/catalogo');

        $htmlContent = $response->body();

        return view('tienda.index', compact('htmlContent'));
    }
}