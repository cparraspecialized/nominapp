<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TipoRetiroExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $tiporetiro;

    public function collection()
    {
        return $this->tiporetiro;
    }

    public function headings(): array
    {
        return [
            'Tipo Retiro', 

        ];
    }

    public function __construct($tiporetiro = null)
    {
        $this->tiporetiro = $tiporetiro;
    }
}
