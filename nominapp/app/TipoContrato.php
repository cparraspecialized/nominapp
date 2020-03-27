<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoContrato extends Model
{
      //Tabla en BD
   protected $table='tipocontrato';

   //Llave Primaria
   protected $primaryKey="id";

   //Agrega informacion de creacion a la tabla
   public $timestamps=true;

   protected $filliable=[
       'descripcionTipoContrato',
       'created_at',
       'updated_at'
   ];

   protected $guarded=[

   ];
    public function Empleado(){
        return $this->hasMany(Empleado::class);
        }
}
