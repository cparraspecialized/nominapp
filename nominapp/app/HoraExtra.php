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
       'fkidUsuario',
       'observacionHoraExtra'   
   ];

   protected $guarded=[

   ];
   public function tipohoras(){
    return $this->belongsTo(TipoHora::class,'fkidTipoHora');
    }

    public function empleados(){
        return $this->belongsTo(Empleado::class,'fkcedulaEmpleado');
    }

    public function users(){
        return $this->belongsTo(User::class,'fkidUsuario');
    }
}
