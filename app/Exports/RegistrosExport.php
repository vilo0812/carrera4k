<?php

namespace App\Exports;


use App\Exports\collection;
use App\Registro;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;

class RegistrosExport implements FromCollection
{
	use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
    	$registros = (new Registro)->RegistrosCompletos();
    	return $registros;

    }
}
