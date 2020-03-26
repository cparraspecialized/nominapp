<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retiro extends Model
{
    //Tabla en BD
    protected $table='retiro';

    //Llave Primaria
    protected $primaryKey="id";
 
    //Agrega informacion de creacion a la tabla
    public $timestamps=true;
 
    protected $filliable=[
        'fkcedulaEmpleado',
        'descripcionIngreso',
        'fechaRetiro',
        'fkidUsuario',
        'created_at',
        'updated_at'
    ];
 
    protected $guarded=[
 
    ];

    //Una TIENDA tiene un MUNICPIO
   public function Empleado(){
    return $this->belongsTo(Empleado::class,'fkcedulaEmpleado');
    }

}
