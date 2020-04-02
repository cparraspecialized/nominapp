<?php

namespace App\Exports;


use App\Empleado;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

use DB;

class EmpleadoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    protected $empleados;

    public function headings(): array
    {
        return [
            'Cedula',
            'Nombres',
            'Apellidos',
            'Tienda',
            'Fecha de Ingreso',
            'Cargo',
            'Contrato',
            'Salario',
            'Estado',
            'Fecha Retiro',
            'Motivo de retiro'

        ];
    }

    public function __construct($empleados = null)
    {
        $this->empleados = $empleados;
    }


    public function collection()
    {
        return $this->empleados = DB::table('empleados')
        ->join('tiendas','fkidTienda','=','tiendas.id')
        ->join('tipocargo','fkidTipoCargo','=','tipocargo.id')
        ->join('tipocontrato','fkidTipoContrato','=','tipocontrato.id')
        ->leftjoin('tiporetiro','fkidTipoRetiro','=','tiporetiro.id')
        ->select(   'empleados.cedula',
                    'empleados.nombreEmpleado',
                    'empleados.apellidoEmpleado',
                    'tiendas.nombreTienda',
                    'empleados.fechaIngresoEmpleado',
                    'tipocargo.descripcionTipoCargo',
                    'tipocontrato.descripcionTipoContrato',
                    'empleados.sueldoEmpleado',
                    'empleados.estadoEmpleado',
                    'empleados.fechaRetiroEmpleado',
                    'tiporetiro.descripcionTipoRetiro'
                    )
        ->get();
    }

    
}
