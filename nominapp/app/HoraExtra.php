<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoraExtra extends Model
{
     //Tabla en BD
   protected $table='hora_extras';

   //Llave Primaria
   protected $primaryKey="id";

   //Agrega informacion de creacion a la tabla
   public $timestamps=true;

   protected $filliable=[
       'fkidTipoHora',
       'fkcedulaEmpleado',
       'horasExtra',
       'fechaHorasExtra',
       'fkidUsuario'   
   ];

   protected $guarded=[

   ];
   public function TipoHora(){
    return $this->belongsTo(TipoHora::class,'fkidTipoHora');
    }

    public function Empleado(){
        return $this->belongsTo(Empleado::class,'fkcedulaEmpleado');
    }

    public function users(){
        return $this->belongsTo(User::class,'fkidUsuario');
    }
}
