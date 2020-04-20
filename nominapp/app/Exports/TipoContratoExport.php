<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TipoContratoExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $tipocontrato;

    public function collection()
    {
        return $this->tipocontrato;
    }

    public function headings(): array
    {
        return [
            'Tipo Contrato', 

        ];
    }

    public function __construct($tipocontrato = null)
    {
        $this->tipocontrato = $tipocontrato;
    }
}
