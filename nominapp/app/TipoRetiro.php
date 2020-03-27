<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoRetiro extends Model
{
     //Tabla en BD
   protected $table='tiporetiro';

   //Llave Primaria
   protected $primaryKey="id";

   //Agrega informacion de creacion a la tabla
   public $timestamps=true;

   protected $filliable=[
       'descripcionTipoRetiro',
       'created_at',
       'updated_at'
   ];

   protected $guarded=[

   ];
    public function Empleado(){
        return $this->hasMany(Empleado::class);
        }
}
