<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('fkidTienda')->nullable();
            $table->unsignedInteger('fkidRol')->nullable();

            $table->foreign('fkidTienda')->references('id')->on('tiendas')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('fkidRol')->references('id')->on('rol')
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
