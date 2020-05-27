<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salarios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('salarioBase');
            $table->string('bonificacion');
            $table->string('auxilioTransporte');
            $table->string('auxilioCapacitacion');
            $table->string('auxilioComunicacion');
            $table->string('gastoRepresentacion');
            $table->string('auxilioMedicinaPrepagada');
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
        Schema::dropIfExists('salarios');
    }
}
