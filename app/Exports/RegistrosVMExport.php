<?php

namespace App\Exports;

use App\Registro;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class RegistrosVMExport implements FromCollection
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $registros = (new Registro)->RegistrosByDistancia(2);
    	return $registros;
    }
}
