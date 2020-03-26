<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
     //Tabla en BD
   protected $table='municipios';

   //Llave Primaria
   protected $primaryKey="codigoMunicipio";

   //Agrega informacion de creacion a la tabla
   public $timestamps=true;

   protected $filliable=[
       'nombreMunicipio',
       'fkcodigoDepartamento',
       'created_at',
       'updated_at'
   ];

   protected $guarded=[

   ];


   //Un MUNICIPIO tiene un DEPARTAMENTO
   public function Departamentos(){
    return $this->belongsTo(Departamento::class,'fkcodigoDepartamento');
    }

    // Un MUNICIPIO tiene varias TIENDAS

    public function tiendas(){
    return $this->hasMany(Tienda::class);
    }
}
