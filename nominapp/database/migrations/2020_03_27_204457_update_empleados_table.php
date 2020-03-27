<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->date('fechaIngresoEmpleado')->nullable();
            $table->unsignedInteger('fkidTipoContrato')->nullable();
            $table->unsignedInteger('fkidTipoCargo')->nullable();
            $table->integer('sueldoEmpleado');
            $table->date('fechaRetiroEmpleado')->nullable();
            $table->unsignedInteger('fkidTipoRetiro')->nullable();
            $table->unsignedInteger('fkidUsuario')->nullable();

            $table->foreign('fkidUsuario')->references('id')->on('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('fkidTipoContrato')->references('id')->on('tipocontrato')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('fkidTipoCargo')->references('id')->on('tipocargo')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('fkidTipoRetiro')->references('id')->on('tiporetiro')
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
        //
    }
}
