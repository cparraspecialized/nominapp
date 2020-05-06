<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TipoCargoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $tipocargo;


    public function collection()
    {
        return $this->tipocargo;
    }

    public function headings(): array
    {
        return [
            'Tipo Cargo', 

        ];
    }

    public function __construct($tipocargo = null)
    {
        $this->tipocargo = $tipocargo;
    }
}
