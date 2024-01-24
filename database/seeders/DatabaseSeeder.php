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
            'name' => 'recepcionista',
            'email' => 'rece@rece.com',
            'password' => Hash::make('password'),
            'saldo' => 100.00,
            'direccion' => 'Dirección del recepcionista',
            'codigo_postal' => '12345',
            'telefono' => '123-456-7890',
            'rol' => 'recepcionista',
            'Validado' => true,
            'descripcion' => 'Descripción del recep',
            'bloqueado' => false,
            'resumen' => 'Resumen del Recepcionista',
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

        Actividad::create([
            'instalacion_id' => 1, // Cambia según la instalación deseada
            'nombre' => 'Futbol',
            'precio' => 30.00,
            'fechaI' => '2024-02-01 14:00',
            'fechaFin' => '2024-02-01 16:00',
            'user_id' => 3, // Cambia según el usuario deseado
            'descripcion' => 'Descripción de la Actividad Manual 1.',
            'urlphoto' => 'url/photo/actividad1.jpg',
        ]);

        // Actividad 2
        Actividad::create([
            'instalacion_id' => 1, // Cambia según la instalación deseada
            'nombre' => 'Actividad Manual 2',
            'precio' => 25.00,
            'fechaI' => '2024-02-05 10:00',
            'fechaFin' => '2024-02-05 12:00',
            'user_id' => 2, // Cambia según el usuario deseado
            'descripcion' => 'Descripción de la Actividad Manual 2.',
            'urlphoto' => 'url/photo/actividad2.jpg',
        ]);

        // Actividad 3
        Actividad::create([
            'instalacion_id' => 1, // Cambia según la instalación deseada
            'nombre' => 'Actividad Manual 3',
            'precio' => 20.00,
            'fechaI' => '2024-02-10 16:00',
            'fechaFin' => '2024-02-10 18:00',
            'user_id' => 3, // Cambia según el usuario deseado
            'descripcion' => 'Descripción de la Actividad Manual 3.',
            'urlphoto' => 'url/photo/actividad3.jpg',
        ]);

        // Actividad 4
        Actividad::create([
            'instalacion_id' => 1, // Cambia según la instalación deseada
            'nombre' => 'Actividad Manual 4',
            'precio' => 35.00,
            'fechaI' => '2024-02-15 12:00',
            'fechaFin' => '2024-02-15 14:00',
            'user_id' => 2, // Cambia según el usuario deseado
            'descripcion' => 'Descripción de la Actividad Manual 4.',
            'urlphoto' => 'url/photo/actividad4.jpg',
        ]);

        // Actividad 5
        Actividad::create([
            'instalacion_id' => 1, // Cambia según la instalación deseada
            'nombre' => 'Actividad Manual 5',
            'precio' => 40.00,
            'fechaI' => '2024-02-20 08:00',
            'fechaFin' => '2024-02-20 10:00',
            'user_id' => 3, // Cambia según el usuario deseado
            'descripcion' => 'Descripción de la Actividad Manual 5.',
            'urlphoto' => 'url/photo/actividad5.jpg',
        ]);

        Actividad::create([
            'instalacion_id' => 1, // Cambia según la instalación deseada
            'nombre' => 'Clase de Yoga',
            'precio' => 30.00,
            'fechaI' => '2024-01-14 14:00',
            'fechaFin' => '2024-01-14 16:00',
            'user_id' => 2, // Cambia según el usuario deseado
            'descripcion' => 'Disfruta de una relajante clase de yoga.',
            'urlphoto' => 'url/photo/yoga.jpg',
        ]);

        // Actividad 2
        Actividad::create([
            'instalacion_id' => 1, // Cambia según la instalación deseada
            'nombre' => 'Partido de Fútbol',
            'precio' => 25.00,
            'fechaI' => '2024-01-15 10:00',
            'fechaFin' => '2024-01-15 12:00',
            'user_id' => 2, // Cambia según el usuario deseado
            'descripcion' => 'Juega un emocionante partido de fútbol con amigos.',
            'urlphoto' => 'url/photo/futbol.jpg',
        ]);

        // Actividad 3
        Actividad::create([
            'instalacion_id' => 1, // Cambia según la instalación deseada
            'nombre' => 'Clase de Baile',
            'precio' => 20.00,
            'fechaI' => '2024-01-16 16:00',
            'fechaFin' => '2024-01-16 18:00',
            'user_id' => 3, // Cambia según el usuario deseado
            'descripcion' => 'Aprende nuevos movimientos en una clase de baile divertida.',
            'urlphoto' => 'url/photo/baile.jpg',
        ]);

        // Actividad 4
        Actividad::create([
            'instalacion_id' => 1, // Cambia según la instalación deseada
            'nombre' => 'Entrenamiento Funcional',
            'precio' => 35.00,
            'fechaI' => '2024-01-18 12:00',
            'fechaFin' => '2024-01-18 14:00',
            'user_id' => 3, // Cambia según el usuario deseado
            'descripcion' => 'Sesión de entrenamiento funcional para mejorar tu condición física.',
            'urlphoto' => 'url/photo/entrenamiento.jpg',
        ]);

        // Actividad 5
        Actividad::create([
            'instalacion_id' => 1, // Cambia según la instalación deseada
            'nombre' => 'Carrera de Running',
            'precio' => 40.00,
            'fechaI' => '2024-01-20 08:00',
            'fechaFin' => '2024-01-20 10:00',
            'user_id' => 3, // Cambia según el usuario deseado
            'descripcion' => 'Participa en una emocionante carrera de running.',
            'urlphoto' => 'url/photo/running.jpg',
        ]);
    }
}
