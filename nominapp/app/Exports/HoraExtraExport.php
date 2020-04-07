<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class HoraExtraExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $horasextras;

    public function collection()
    {
        return $this->horasextras;
    }

    public function headings(): array
    {
        return [
            'Cedula',
            'Nombres',
            'Apellidos',
            'Tienda',
            'Tipo Hora Extra',
            'Horas extras',
            'Fecha Horas extras',
            'Observacion Hora Extra',
            'Usuario que ingreso la hora extra'

        ];
    }

    public function __construct($horasextras = null)
    {
        $this->horasextras = $horasextras;

    }
}
