<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
   //Tabla en BD
   protected $table='divisiones';

   //Llave Primaria
   protected $primaryKey="id";

   //Agrega informacion de creacion a la tabla
   public $timestamps=true;

   protected $filliable=[
       'division',
       'descripcionDivision',
       'created_at',
       'updated_at'
   ];

   protected $guarded=[

   ];

   public function empleados(){
    return $this->belongsTo(Empleado::class,'fkdivision');
}
}
