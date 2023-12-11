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
        Schema::create('calendarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('actividade_id')->nullable()->constrained();
            $table->foreignId('monitore_id')->nullable()->constrained();
            $table->foreignId('reserva_id')->nullable()->constrained();
            $table->date('fecha');
            $table->time('hora');
            $table->integer('plazas');
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
        Schema::dropIfExists('calendarios');
    }
};
