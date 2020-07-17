<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalarioExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $salario;

    public function collection()
    {
        return $this->salario;
    }

    public function headings(): array
    {
        return [
            'id',
            'Empleado',
            'Salario',
            'Bonificacion',
            'Salario Base',
            'Auxilio de Transporte',
            'Auxilio de Transporte Especial',
            'Auxilio Medicina Prepagada',      

        ];
    }

    public function __construct($salario = null)
    {
        $this->salario = $salario;

    }
}
