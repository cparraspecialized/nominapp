<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Tiendas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiendas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombreTienda');
            $table->unsignedInteger('fkcodigoMunicipio')->nullable();
            $table->timestamps();

            $table->foreign('fkcodigoMunicipio')->references('codigoMunicipio')->on('municipios')
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
        Schema::dropForeign(['fkcodigoMunicipio']);
        Schema::dropIfExists('tiendas');
    }
}
