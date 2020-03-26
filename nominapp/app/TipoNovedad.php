<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoNovedad extends Model
{
      //Tabla en BD
   protected $table='tipo_novedades';

   //Llave Primaria
   protected $primaryKey="id";

   //Agrega informacion de creacion a la tabla
   public $timestamps=true;

   protected $filliable=[
       'descripcionTipoNovedad',
       'created_at',
       'updated_at'
   ];

   protected $guarded=[

   ];

}
