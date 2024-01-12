<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\ActividadController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/actividades',[ActividadController::class, 'Actividades'])->name('Actividades');
Route::get('/monitores', [MonitorController::class , 'monitores'])->name('monitores.list');
Route::get('/actividad/{id}',[ActividadController::class, 'Actividad'])->name('Actividad');

