<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
   //Tabla en BD
   protected $table='empleados';

   //Llave Primaria
   protected $primaryKey="cedula";

   //Agrega informacion de creacion a la tabla
   public $timestamps=true;

   protected $filliable=[
       'nombreEmpleado',
       'apellidoEmpleado',
       'fkidTienda',
       'estadoEmpleado',
       'created_at',
       'updated_at'
   ];

   protected $guarded=[

   ];

  




   public function Retiro(){
    return $this->hasMany(Retiro::class,'cedula');
    }
}
