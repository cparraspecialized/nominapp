<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEmpleadoscentrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->unsignedInteger('fkcentroCostos')->nullable();
            $table->unsignedInteger('fkdivision')->nullable();

            $table->foreign('fkcentroCostos')->references('id')->on('centrocostos')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            
            $table->foreign('fkdivision')->references('id')->on('divisiones')
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
