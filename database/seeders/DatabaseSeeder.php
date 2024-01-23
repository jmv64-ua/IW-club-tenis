<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Instalacion;
use App\Models\Actividad;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

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
        
        // Volver a habilitar las restricciones de clave externa
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        // Crea tres usuarios
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => Hash::make('123'),
            'saldo' => 100.00,
            'direccion' => 'Dirección del Administrador',
            'codigo_postal' => '12345',
            'telefono' => '123-456-7890',
            'rol' => 'administrador',
            'Validado' => true,
            'descripcion' => 'Descripción del Administrador',
            'bloqueado' => false,
            'resumen' => 'Resumen del Administrador',
            'urlphoto' => 'url/photo/admin.jpg',
        ]);
        User::create([
            'name' => 'monitor',
            'email' => 'monitor@monitor.com',
            'password' => Hash::make('monitor'),
            'saldo' => 100.00,
            'direccion' => 'Dirección del monitor',
            'codigo_postal' => '12345',
            'telefono' => '123-456-7890',
            'rol' => 'monitor',
            'Validado' => true,
            'descripcion' => 'Descripción del Administrador',
            'bloqueado' => false,
            'resumen' => 'Resumen del Administrador',
            'urlphoto' => 'url/photo/admin.jpg',
        ]);

        User::create([
            'name' => 'Monitor',
            'email' => 'monitor@example.com',
            'password' => Hash::make('password'),
            'saldo' => 100.00,
            'direccion' => 'Dirección del monitor',
            'codigo_postal' => '12345',
            'telefono' => '123-456-7890',
            'rol' => 'monitor',
            'Validado' => true,
            'descripcion' => 'Descripción del monitor',
            'bloqueado' => false,
            'resumen' => 'Resumen del monitor',
            'urlphoto' => 'monitor.png',
        ]);

        // Crear otros usuarios de ejemplo con roles diferentes
        User::factory()->count(5)->create();


        // INSTALACION
        $instalacion = new Instalacion();
        $instalacion->tipo_instalacion= "Pista de tenis";
        $instalacion->aforo= 8;
        $instalacion->urlphoto= 'tenis.png';
        $instalacion->save();

        // INSTALACION
        $instalacion = new Instalacion();
        $instalacion->tipo_instalacion= "Pista de pádel";
        $instalacion->aforo= 4;
        $instalacion->urlphoto= 'tenis.png';
        $instalacion->save();

        Actividad::create([
            'instalacion_id' => 1,
            'nombre' => 'Actividad 1',
            'precio' => 20.00,
            'fechaI' => '2024-01-16 11:00',
            'fechaFin' => '2024-01-16 13:00',
            'user_id' => '2',
            'descripcion' => 'Clases de natación para todos los públicos en distintos horarios',
            'urlphoto' => 'natacion.png',
        ]);

        Actividad::create([
            'instalacion_id' => 1,
            'nombre' => 'Tenis',
            'precio' => 25.00,
            'fechaI' => '2024-01-16 09:00',
            'fechaFin' => '2024-01-16 11:00',
            'user_id' => '2',
            'descripcion' => 'Clases de tenis para todos los públicos en distintos horarios',
            'urlphoto' => 'tenis.png',
        ]);

        Actividad::create([
            'instalacion_id' => 1,
            'nombre' => 'Tenis',
            'precio' => 25.00,
            'fechaI' => '2024-01-24 09:00',
            'fechaFin' => '2024-01-24 11:00',
            'user_id' => '2',
            'descripcion' => 'Clases de tenis para todos los públicos en distintos horarios',
            'urlphoto' => 'tenis.png',
        ]);
    }
}
