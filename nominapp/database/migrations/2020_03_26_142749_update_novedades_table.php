<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateNovedadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('novedades', function (Blueprint $table) {
            $table->unsignedInteger('fktipoNovedad')->nullable();
        });

        Schema::table('novedades', function (Blueprint $table) {
            $table->dropColumn('descripcionNovedad');

            $table->foreign('fktipoNovedad')->references('id')->on('tipo_novedades')
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
