<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroCosto extends Model
{
    //Tabla en BD
   protected $table='centrocostos';

   //Llave Primaria
   protected $primaryKey="id";

   //Agrega informacion de creacion a la tabla
   public $timestamps=true;

   protected $filliable=[
       'centroCosto',
       'descripcionCentroCostos',
       'created_at',
       'updated_at'
   ];

   protected $guarded=[

   ];

   public function empleados(){
    return $this->belongsTo(Empleado::class,'fkcentroCostos');
    }

}
