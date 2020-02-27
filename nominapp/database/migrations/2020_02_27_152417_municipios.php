<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Municipios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {

            $table->increments('codigoMunicipio');
            $table->string('nombreMunicipio');
            $table->unsignedInteger('fkcodigoDepartamento')->nullable();
            $table->timestamps();

            $table->foreign('fkcodigoDepartamento')->references('codigoDepartamento')->on('departamentos')
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
        Schema::dropForeign(['fkcodigoDepartamento']);
        Schema::dropIfExists('municipios');
    }
}
