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
        Schema::create('instalaciones', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('reserva_id')->nullable()->constrained();
            $table->string('tipo_instalacion');
            $table->integer('aforo');
               
           

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('instalaciones');
    }
};
