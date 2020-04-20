<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TipoHoraExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $tipohoras;

    public function collection()
    {
        return $this->tipohoras;
    }

    public function headings(): array
    {
        return [
            'Id',
            'Tipo Hora Extra', 
            'Fecha creacion',
        ];
    }

    public function __construct($tipohoras = null)
    {
        $this->tipohoras = $tipohoras;
    }
}
