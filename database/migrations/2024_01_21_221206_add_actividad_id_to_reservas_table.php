<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddActividadIdToReservasTable extends Migration
{
    public function up()
    {
        Schema::table('reservas', function (Blueprint $table) {
            // Agrega la nueva columna 'actividad_id' como clave foránea
            $table->foreignId('actividad_id')->nullable()->constrained('actividades')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('reservas', function (Blueprint $table) {
            // Elimina la columna 'actividad_id' en la reversión
            $table->dropForeign(['actividad_id']);
            $table->dropColumn('actividad_id');
        });
    }
}
