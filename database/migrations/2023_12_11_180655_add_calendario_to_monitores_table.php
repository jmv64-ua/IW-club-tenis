<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Eliminar la restricción de clave foránea
        Schema::table('monitores', function (Blueprint $table) {
            $table->foreignId('calendario_id')->nullable()->constrained('calendarios')->onDelete('cascade');
        });
        
        
    }

    public function down()
    {
        // Eliminar la columna
        Schema::table('monitores', function (Blueprint $table) {
            $table->dropForeign(['calendario_id']);
            $table->dropColumn('calendario_id');
        });
    }
};
