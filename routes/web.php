<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\InstalacionController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Auth\LoginController; // Importar el controlador LoginController
use App\Http\Controllers\Auth\RegisterController; // Importar el controlador RegisterController
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\UserController;
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


Route::get('/actividadesCalendario',[ActividadController::class, 'ActividadesCalendario'])->name('ActividadesCalendario');
Route::get('/monitores', [MonitorController::class , 'index'])->name('monitores.index');
Route::get('/monitores/{id}', [MonitorController::class, 'show'])->name('monitores.show');
Route::get('/actividad/{id}',[ActividadController::class, 'Actividad'])->name('Actividad');
Route::get('/instalaciones', [InstalacionController::class, 'index'])->name('instalaciones.index');
Route::get('/instalaciones/{id}', [InstalacionController::class, 'show'])->name('instalaciones.show');
Route::put('/instalaciones/{id}', [InstalacionController::class, 'bloquear'])->name('instalaciones.bloquear');
Route::get('/instalacionesAdmin', [InstalacionController::class, 'indexAdmin'])->name('instalaciones.InstalacionesAdmin');
Route::get('/actividadNew/nueva', [ActividadController::class, 'AsignarActividad'])->name('actividad.nueva');
Route::post('/actividadNew/nueva', [ActividadController::class, 'NuevaActividad'])->name('createActividad');
Route::get('/actividades',[ActividadController::class, 'Actividades'])->name('Actividades');
Route::get('/user',[UserController::class, 'Usuario'])->name('Usuario');
Route::put('/user',[UserController::class, 'Usuarioedit'])->name('Usuarioedit');
/*
Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
Route::get('/admin/users/{id}', [AdminUserController::class, 'validar'])->name('admin.users.validar');
*/

Route::middleware(['checkRole:admin'])->group(function () {
    // Rutas para usuarios con el rol 'admin'
   // Route::get('/actividadesCalendario', [ActividadController::class, 'ActividadesCalendario'])->name('ActividadesCalendario');
   // Route::get('/instalacionesAdmin', [InstalacionController::class, 'indexAdmin'])->name('instalaciones.InstalacionesAdmin');
    //Route::get('/actividadNew/nueva', [ActividadController::class, 'AsignarActividad'])->name('actividad.nueva');
});

// Estas rutas ya son definidas automáticamente por Auth::routes()
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
