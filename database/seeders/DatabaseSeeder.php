<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Administrador;
use App\Models\Socio;
use App\Models\Recepcionista;
use App\Models\Instalacion;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Deshabilitar las restricciones de clave externa para eliminar datos en el orden correcto
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Eliminar datos de las tablas
        Administrador::truncate();
        User::truncate();
        Socio::truncate();
        Recepcionista::truncate();
        // Volver a habilitar las restricciones de clave externa
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Crea tres usuarios
        $users = User::factory(6)->create();

        // UN ADMIN
        $admin = new Administrador();
        $admin->user_id = $users->first()->id; // Asigna el primer usuario como administrador
        $admin->save();

        // UN SOCIO
        $secondUser = User::skip(1)->take(1)->first();
        $socio = new Socio();
        $socio->user_id = $secondUser->id;
        $socio->save();

        // UN RECEPCIONISTA
        $thirdUser = User::skip(2)->take(1)->first();

        // Crea el registro del recepcionista asociado al tercer usuario
        $recepcionista = new Recepcionista();
        $recepcionista->user_id = $thirdUser->id;
        $recepcionista->save();

        // INSTALACION
        $instalacion = new Instalacion([
            'tipo_instalacion' => 'Pista de tenis',
            'aforo' => 8,
        ]);
        $instalacion->save();
    }
}