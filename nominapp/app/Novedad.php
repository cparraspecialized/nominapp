<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    //Tabla en BD
    protected $table='novedades';

    //Llave Primaria
    protected $primaryKey="id";
 
    //Agrega informacion de creacion a la tabla
    public $timestamps=true;
 
    protected $filliable=[
        'fkcedulaEmpleado',
        'fechaNovedad',
        'fkidUsuario',
        'created_at',
        'updated_at',
        'fktipoNovedad'
    ];
 
    protected $guarded=[
 
    ];
 
    //Una TIENDA tiene un MUNICPIO
    public function TipoNovedad(){
        return $this->belongsTo(TipoNovedad::class,'fktipoNovedad');
     }

     public function users(){
        return $this->belongsTo(User::class,'fkidUsuario');
    }
}
