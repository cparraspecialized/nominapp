<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('cedula');
            $table->string('nombreEmpleado');
            $table->string('apellidoEmpleado');
            $table->unsignedInteger('fkidTienda')->nullable();
            $table->string('estadoEmpleado');
            $table->timestamps();


            $table->foreign('fkidTienda')->references('id')->on('tiendas')
            ->onDelete('set null')
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
        Schema::dropIfExists('empleados');
    }
}
