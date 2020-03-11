<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novedades', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcionNovedad');
            $table->unsignedInteger('fkcedulaEmpleado')->nullable();
            $table->date('fechaNovedad');
            $table->unsignedInteger('fkidUsuario')->nullable();
            $table->timestamps();

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
        Schema::dropIfExists('novedades');
    }
}
