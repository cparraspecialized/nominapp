<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salario extends Model
{
     //Tabla en BD
   protected $table='salarios';

   //Llave Primaria
   protected $primaryKey="id";

   //Agrega informacion de creacion a la tabla
   public $timestamps=true;

   protected $filliable=[
        'fkCedulaEmpleado',
       'salarioBase',       
       'bonificacion',
       'auxilioTransporte',
       'auxilioCapacitacion',
       'auxilioComunicacion',
       'gastoRepresentacion',
       'auxilioMedicinaPrepagada',
       'created_at',
       'updated_at'
   ];
   public function empleados(){
    return $this->belongsTo(Empleado::class,'fkCedulaEmpleado');
}
}
