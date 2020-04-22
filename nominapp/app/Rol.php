<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    //Tabla en BD
    protected $table='rol';

    //Llave Primaria
    protected $primaryKey="id";
 
    //Agrega informacion de creacion a la tabla
    public $timestamps=true;
 
    protected $filliable=[
        'tipo_rol',   
    ];         
}
