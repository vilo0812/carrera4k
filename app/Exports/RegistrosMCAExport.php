<?php

namespace App\Exports;

use App\Registro;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class RegistrosMCAExport implements FromCollection
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $registros = (new Registro)->RegistrosByDistancia(1);
    	return $registros;
    }
}
