<?php

namespace App\Exports;

use App\Registro;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;

class RegistroPersonalExport implements FromQuery
{
	use Exportable;
	public function __construct(int $distancia,int $plantel)
    {
        $this->distancia = $distancia;
        $this->plantel = $plantel;
    }
    public function query()
    {
    	return Registro::query()
    	->leftJoin("participantes","registros.participante_id","=","participantes.id")
    	->join("grados","participantes.grado_id","=","grados.id")
        ->join("direcciones","registros.direcciones_id","=","direcciones.id")
        ->join("distancias","registros.distancia_id","=","distancias.id")
        ->join("tallas","registros.talla_id","=","tallas.id")
        ->join("planteles","registros.plantel_id","=","planteles.id")
    	->select('participantes.nombre','participantes.apellido','participantes.cedula','participantes.edad','participantes.sexo','grados.grado','direcciones.direccion','planteles.plantel','distancias.distancia','tallas.zapato','tallas.pantalon','tallas.camisa')
   		->whereDistancia_id($this->distancia)
   		->wherePlantel_id($this->plantel);

   		return (new Registro)->RegistrosByDistanciaByPlantel($this->distancia,$this->plantel);
    }
}
