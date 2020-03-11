<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoraExtrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hora_extras', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fkidTipoHora')->nullable();
            $table->unsignedInteger('fkcedulaEmpleado')->nullable();
            $table->integer('horasExtra');
            $table->date('fechaHorasExtra');
            $table->unsignedInteger('fkidUsuario')->nullable();
            $table->timestamps();

            $table->foreign('fkidTipoHora')->references('id')->on('tipohoras')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('fkcedulaEmpleado')->references('cedula')->on('empleados')
            ->onDelete('cascade')
            ->onUpdate('cascade');


            $table->foreign('fkidUsuario')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hora_extras');
    }
}
