<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
     //Tabla en BD
   protected $table='departamentos';

   //Llave Primaria
   protected $primaryKey="codigoDepartamento";

   //Agrega informacion de creacion a la tabla
   public $timestamps=true;

   protected $filliable=[
       'nombreDepartamento',
       'created_at',
       'updated_at'
   ];

   protected $guarded=[

   ];

   // Los DEPARTAMENTOS tienen varios MUNICIPIOS
   public function Municipios(){
    return $this->hasMany(Municipio::class,'codigoDepartamento');
}
}
