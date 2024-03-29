<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\InstalacionController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminInstalacionController;
use App\Http\Controllers\AdminActividadController;
use App\Http\Controllers\RecepcionistaUserController;
use App\Http\Controllers\Auth\LoginController; // Importar el controlador LoginController
use App\Http\Controllers\Auth\RegisterController; // Importar el controlador RegisterController
use App\Http\Controllers\MonitorController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagosController;
use App\Http\Controllers\APIController;
use App\Models\Instalacion;
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



Route::get('/monitores', [MonitorController::class , 'index'])->name('monitores.index');
Route::get('/monitores/{id}', [MonitorController::class, 'show'])->name('monitores.show');
Route::get('/actividad/{id}',[ActividadController::class, 'Actividad'])->name('Actividad');
Route::get('/instalaciones', [InstalacionController::class, 'index'])->name('instalaciones.index');
Route::get('/instalaciones/{id}', [InstalacionController::class, 'show'])->name('instalaciones.show');
Route::get('/reservasInstalaciones', [InstalacionController::class, 'ReservasInstalaciones'])->name('reservasInstalaciones');
Route::get('/asignarInstalacion', [InstalacionController::class, 'AsignarInstalacion'])->name('asignarInstalacion');
Route::get('/actividades-por-usuario', [ActividadController::class, 'actividadesPorUsuario']);


Route::post('/actividadNew/nueva', [ActividadController::class, 'NuevaActividad'])->name('createActividad');
Route::get('/actividades',[ActividadController::class, 'Actividades'])->name('Actividades');
Route::get('/reservas', [ActividadController::class, 'ActividadesReservas'])->name('reservas');
Route::post('/reservar/{id}', [ReservaController::class, 'reservar'])->name('reservar');
Route::post('/reservarInstalacion/{id}', [ReservaController::class, 'reservarInstalacion'])->name('reservarInstalacion');
Route::get('/reservas/{id}', [ReservaController::class, 'historialReservas'])->name('historialReservas');
Route::get('/user',[UserController::class, 'Usuario'])->name('Usuario');
Route::get('/recargarSaldo',[PagosController::class, 'PasarelaDePago'])->name('PasarelaDePago');
Route::post('/recargarSaldo',[PagosController::class, 'post'])->name('recargarSaldo');
Route::put('/user',[UserController::class, 'Usuarioedit'])->name('Usuarioedit');

Route::get('/tienda', [APIController::class, 'obtenerProductos'])->name('tienda.index');

Route::prefix('admin/users')->middleware(['checkRole:administrador'])->group(function () {
    Route::get('/', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/create', [AdminUserController::class, 'create'])->name('admin.users.create');
    Route::post('/store', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::get('/{id}/edit', [AdminUserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/{id}/update', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/{id}/destroy', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/{id}', [AdminUserController::class, 'show'])->name('admin.users.show');
    Route::get('/{id}/validate', [AdminUserController::class, 'validar'])->name('admin.users.validate');
    Route::get('/{id}/block', [AdminUserController::class, 'bloquear'])->name('admin.users.bloquear');
});

Route::prefix('admin/instalaciones')->middleware(['checkRole:administrador'])->group(function () {
    Route::get('/', [AdminInstalacionController::class, 'index'])->name('admin.instalaciones.index');
    Route::get('/create', [AdminInstalacionController::class, 'create'])->name('admin.instalaciones.create');
    Route::post('/store', [AdminInstalacionController::class, 'store'])->name('admin.instalaciones.store');
    Route::get('/{id}/edit', [AdminInstalacionController::class, 'edit'])->name('admin.instalaciones.edit');
    Route::put('/{id}/update', [AdminInstalacionController::class, 'update'])->name('admin.instalaciones.update');
    Route::delete('/{id}/destroy', [AdminInstalacionController::class, 'destroy'])->name('admin.instalaciones.destroy');
    Route::get('/{id}', [AdminInstalacionController::class, 'show'])->name('admin.instalaciones.show');
});

Route::prefix('admin/actividades')->middleware(['checkRole:administrador'])->group(function () {
    Route::get('/', [AdminActividadController::class, 'index'])->name('admin.actividades.index');
    Route::get('/create', [AdminActividadController::class, 'create'])->name('admin.actividades.create');
    Route::post('/store', [AdminActividadController::class, 'store'])->name('admin.actividades.store');
    Route::get('/{id}/edit', [AdminActividadController::class, 'edit'])->name('admin.actividades.edit');
    Route::put('/{id}/update', [AdminActividadController::class, 'update'])->name('admin.actividades.update');
    Route::delete('/{id}/destroy', [AdminActividadController::class, 'destroy'])->name('admin.actividades.destroy');
    Route::get('/{id}', [AdminActividadController::class, 'show'])->name('admin.actividades.show');
});

Route::prefix('recepcionista/users')->middleware(['checkRole:recepcionista'])->group(function () {
    Route::get('/', [RecepcionistaUserController::class, 'index'])->name('recepcionista.users.index');
    Route::get('/create', [RecepcionistaUserController::class, 'create'])->name('recepcionista.users.create');
    Route::post('/store', [RecepcionistaUserController::class, 'store'])->name('recepcionista.users.store');
    // ... (otras rutas específicas para recepcionistas)
});

Route::prefix('monitor')->group(function () {
    Route::get('/actividades', [MonitorController::class, 'actividades'])->name('monitor.actividades');
    // ... otras rutas específicas para monitores
});

Route::prefix('monitor')->group(function () {
    Route::get('/actividades', [MonitorController::class, 'actividades'])->name('monitor.actividades');
    // ... otras rutas específicas para monitores
});

Route::middleware(['checkRole:administrador,monitor'])->group(function () {
    Route::get('/actividadesCalendario', [ActividadController::class, 'ActividadesCalendario'])->name('ActividadesCalendario');
    // Otras rutas específicas para administradores y monitores
});

Route::middleware(['checkRole:administrador'])->group(function () {
    // Rutas para usuarios con el rol 'admin'
    Route::put('/instalaciones/{id}', [InstalacionController::class, 'bloquear'])->name('instalaciones.bloquear');
    Route::get('/instalacionesAdmin', [InstalacionController::class, 'indexAdmin'])->name('instalaciones.InstalacionesAdmin');
    Route::get('/actividadNew/nueva', [ActividadController::class, 'AsignarActividad'])->name('actividad.nueva');
    Route::get('/estadisticasAdmin', [AdminUserController::class, 'estadisticasAdmin'])->name('estadisticasAdmin');
});

// Estas rutas ya son definidas automáticamente por Auth::routes()
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
