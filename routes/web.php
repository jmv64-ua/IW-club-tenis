<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActividadController;
use App\Http\Controllers\InstalacionController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Auth\LoginController; // Importar el controlador LoginController
use App\Http\Controllers\Auth\RegisterController; // Importar el controlador RegisterController

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

Route::get('/actividades', [ActividadController::class, 'Actividades'])->name('Actividades');
Route::get('/monitores', [MonitorController::class, 'monitores'])->name('monitores.list');

Route::get('/instalaciones', [InstalacionController::class, 'index'])->name('instalaciones.index');
Route::get('/instalaciones/{id}', [InstalacionController::class, 'show'])->name('instalaciones.show');

Route::middleware(['auth', 'admin'])->group(function () {
    // Agregar rutas de CRUD para usuarios aquí
    Route::resource('/admin/users', AdminUserController::class);
});

// Estas rutas ya son definidas automáticamente por Auth::routes()
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
