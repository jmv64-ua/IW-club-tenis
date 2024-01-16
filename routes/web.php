<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\InstalacionController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Auth\LoginController; // Importar el controlador LoginController
use App\Http\Controllers\Auth\RegisterController; // Importar el controlador RegisterController
use App\Http\Controllers\MonitorController;
use Illuminate\Support\Facades\Auth;


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
Route::get('/actividadesCalendario',[ActividadController::class, 'ActividadesCalendario'])->name('ActividadesCalendario');
Route::get('/monitores', [MonitorController::class , 'index'])->name('monitores.index');
Route::get('/monitores/{id}', [MonitorController::class, 'show'])->name('monitores.show');
Route::get('/actividad/{id}',[ActividadController::class, 'Actividad'])->name('Actividad');
Route::get('/instalaciones', [InstalacionController::class, 'index'])->name('instalaciones.index');
Route::get('/instalaciones/{id}', [InstalacionController::class, 'show'])->name('instalaciones.show');
Route::put('/instalaciones/{id}', [InstalacionController::class, 'bloquear'])->name('instalaciones.bloquear');
Route::get('/instalacionesAdmin', [InstalacionController::class, 'indexAdmin'])->name('instalaciones.InstalacionesAdmin');
Route::get('/actividadNew/nueva', [ActividadController::class, 'AsignarActividad'])->name('actividad.nueva');
Route::middleware(['auth', 'admin'])->group(function () {
    // Agregar rutas de CRUD para usuarios aquí
    Route::resource('/admin/users', AdminUserController::class);
});

// Estas rutas ya son definidas automáticamente por Auth::routes()
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
