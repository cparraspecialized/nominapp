<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
   //Tabla en BD
   protected $table='empleados';

   //Llave Primaria
   protected $primaryKey="cedula";

   //Agrega informacion de creacion a la tabla
   public $timestamps=true;

   protected $filliable=[
       'nombreEmpleado',
       'apellidoEmpleado',
       'fkidTienda',
       'estadoEmpleado',
       'created_at',
       'updated_at',
       'fechaIngresoEmpleado',
       'fkidTipoContrato',
       'fkidTipoCargo',
       'sueldoEmpleado',
       'fechaRetiroEmpleado',
       'fkidTipoRetiro',
       'fkcentroCostos',
       'fkdivision',
       'fksalario',
       'fkidUsuario',
       'fechaFinContratoEmpleado',
       'validacionRetiro'

   ];

   protected $guarded=[

   ];
   public function Ingreso(){
    return $this->belongsTo(Ingreso::class,'cedula');
    }

    public function Retiro(){
        return $this->belongsTo(Retiro::class,'cedula');
    }

    public function HoraExtra(){
        return $this->belongsTo(HoraExtra::class,'cedula');
    }

    public function tiendas(){
        return $this->belongsTo(Tienda::class,'fkidTienda');
    }

    public function tipocargo(){
        return $this->belongsTo(TipoCargo::class,'fkidTipoCargo');
    }

    public function tipocontrato(){
        return $this->belongsTo(TipoContrato::class,'fkidTipoContrato');
    }

    public function tiporetiro(){
        return $this->belongsTo(TipoRetiro::class,'fkidTipoRetiro');
    }

    
    public function users(){
        return $this->belongsTo(User::class,'fkidUsuario');
    }

    public function CentroCosto(){
        return $this->belongsTo(CentroCosto::class,'fkcentroCostos');
    }

    public function Division(){
        return $this->belongsTo(Division::class,'fkdivision');
    }

    public function Salario(){
        return $this->belongsTo(Salario::class,'fksalario');
    }

}
