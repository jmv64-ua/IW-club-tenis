<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('instalacion_id')->nullable()->constrained('instalaciones')->onDelete('cascade');
            $table->string('nombre');
            $table->decimal('precio', 10, 2);
            $table->text('descripcion');
            $table->date('fecha');
            $table->time('hora');
            $table->string('urlphoto')->nullable();
            $table->timestamps();
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actividades');
    }
};
