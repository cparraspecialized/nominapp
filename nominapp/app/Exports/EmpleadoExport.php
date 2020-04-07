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
            'Fecha fin de Contrato',
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

        return $this->empleados;
    }

    
}
