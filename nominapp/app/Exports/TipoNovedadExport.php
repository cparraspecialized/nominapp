<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;


class TipoNovedadExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $tiponovedad;

    public function collection()
    {
        return $this->tiponovedad;
    }

    public function headings(): array
    {
        return [
            'Tipo Novedad', 

        ];
    }

    public function __construct($tiponovedad = null)
    {
        $this->tiponovedad = $tiponovedad;
    }
}
