<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalarioExport implements FromCollection
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
            'salarioBase',
            'bonificacion',
            'auxilioTransporte',
            'auxilioCapacitacion',
            'auxilioComunicacion',
            'gastoRepresentacion',
            'auxilioMedicinaPrepagada',      

        ];
    }

    public function __construct($salario = null)
    {
        $this->salario = $salario;

    }
}
