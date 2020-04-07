<?php

namespace App\Exports;

use App\Novedad;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NovedadExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected $novedades;

    public function collection()
    {
        return $this->novedades;
    }

    public function headings(): array
    {
        return [
            'Cedula',
            'Nombres',
            'Apellidos',
            'Tienda',
            'Novedad',
            'Fecha de la novedad',
            'Observacion',
            'Usuario que hizo la novedad'

        ];
    }

    public function __construct($novedades = null)
    {
        $this->novedades = $novedades;

    }

}
