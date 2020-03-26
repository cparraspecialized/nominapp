<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoHora extends Model
{
    //Tabla en BD
   protected $table='tipohoras';

   //Llave Primaria
   protected $primaryKey="id";

   //Agrega informacion de creacion a la tabla
   public $timestamps=true;

   protected $filliable=[
       'descripcionTipo',
   ];

   protected $guarded=[

   ];
   public function HoraExtra(){
    return $this->belongsTo(HoraExtra::class,'id');
    }
}
