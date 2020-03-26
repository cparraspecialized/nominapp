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
    public function TipoNovedades(){
        return $this->belongsTo(TipoNovedades::class,'fktipoNovedad');
     }

    public function User(){
        return $this->belongsTo(User::class,'fkidUsuario');
    }
}
