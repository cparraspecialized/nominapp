<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TiendaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $tienda;

    public function collection()
    {
        return $this->tienda;
    }

    public function headings(): array
    {
        return [
            'Tienda',
            'Municipio',       

        ];
    }

    public function __construct($tienda = null)
    {
        $this->tienda = $tienda;

    }
}
