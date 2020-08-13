<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
    //Tabla en BD
   protected $table='parametros';

   //Llave Primaria
   protected $primaryKey="id";

   //Agrega informacion de creacion a la tabla
   public $timestamps=true;

   protected $filliable=[
       'salarioMinimo',       
       'auxilioTransportes',       
       'created_at',
       'updated_at'
   ];
}
