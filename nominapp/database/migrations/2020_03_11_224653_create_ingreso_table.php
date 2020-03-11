<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingreso', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fkcedulaEmpleado')->nullable();
            $table->string('descripcionIngreso');
            $table->date('fechaIngreso');
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
        Schema::dropIfExists('ingreso');
    }
}
