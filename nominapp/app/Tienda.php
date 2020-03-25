<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
     //Tabla en BD
   protected $table='tiendas';

   //Llave Primaria
   protected $primaryKey="id";

   //Agrega informacion de creacion a la tabla
   public $timestamps=true;

   protected $filliable=[
       'nombreTienda',
       'fkcodigoMunicipio',
       'created_at',
       'updated_at'
   ];

   protected $guarded=[

   ];

   //Una TIENDA tiene un MUNICPIO
   public function Municipio(){
    return $this->belongsTo(Municipio::class,'fkcodigoMunicipio');
    }

}

