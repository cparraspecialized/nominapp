<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
   //Tabla en BD
   protected $table='ingreso';

   //Llave Primaria
   protected $primaryKey="id";

   //Agrega informacion de creacion a la tabla
   public $timestamps=true;

   protected $filliable=[
       'fkcedulaEmpleado',
       'descripcionIngreso',
       'fechaIngreso',
       'fkidUsuario'       
   ];

   protected $guarded=[

   ];
   public function Empleado(){
    return $this->belongsTo(Empleado::class,'fkcedulaEmpleado');
    }

    public function users(){
        return $this->belongsTo(User::class,'fkidUsuario');
    }

}
