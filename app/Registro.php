<?php

namespace App;

use App\Direcciones;
use App\Distancia;
use App\Grado;
use App\Participante;
use App\Planteles;
use App\Registro;
use App\Talla;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
<<<<<<< HEAD
    /*public funtion n_competidor(){
        $id = Registro::get()->last();
    if($id == null){
        $id = 1;
    }else{
        $id = $id->n_competidor;
        $id = $id + 1;
    }
    }*/
    /*public function RegistrosCompletos(){
    	$registro = static::leftJoin("participantes","registros.participante_id","=","participantes.id")->join("grados","participantes.grado_id","=","grados.id")->join("direcciones","registros.direccion_id","=","direcciones.id")->join("distancias","registros.distancia_id","=","distancias.id")->join("tallas","registros.talla_id","=","tallas.id")->select('participantes.nombre','participantes.apellido','participantes.cedula','participantes.edad','participantes.sexo','grados.grado','direcciones.direccion','direcciones.plantel','distancias.distancia','tallas.zapato','tallas.pantalon','tallas.camisa')->get();
=======
    public function RegistrosByDistanciaByPlantel($distancia,$plantel){
        $registro = static::leftJoin("participantes","registros.participante_id","=","participantes.id")
        ->join("grados","participantes.grado_id","=","grados.id")
        ->join("direcciones","registros.direcciones_id","=","direcciones.id")
        ->join("distancias","registros.distancia_id","=","distancias.id")
        ->join("tallas","registros.talla_id","=","tallas.id")
        ->join("planteles","registros.plantel_id","=","planteles.id")
        ->select('participantes.nombre','participantes.apellido','participantes.cedula','participantes.edad','participantes.sexo','grados.grado','direcciones.direccion','planteles.plantel','distancias.distancia','tallas.zapato','tallas.pantalon','tallas.camisa')
        ->whereDistancia_id($distancia)
        ->wherePlantel_id($plantel)->get();
        return $registro;
    }
    public function RegistrosByDistancia($id){
        $registro = static::leftJoin("participantes","registros.participante_id","=","participantes.id")
        ->join("grados","participantes.grado_id","=","grados.id")
        ->join("direcciones","registros.direcciones_id","=","direcciones.id")
        ->join("distancias","registros.distancia_id","=","distancias.id")
        ->join("tallas","registros.talla_id","=","tallas.id")
        ->join("planteles","registros.plantel_id","=","planteles.id")
        ->select('participantes.nombre','participantes.apellido','participantes.cedula','participantes.edad','participantes.sexo','grados.grado','direcciones.direccion','planteles.plantel','distancias.distancia','tallas.zapato','tallas.pantalon','tallas.camisa')->where("registros.distancia_id","=","$id")->get();
        return $registro;
    }
    public function RegistrosCompletos(){
    	$registro = static::leftJoin("participantes","registros.participante_id","=","participantes.id")
        ->join("grados","participantes.grado_id","=","grados.id")
        ->join("direcciones","registros.direcciones_id","=","direcciones.id")
        ->join("distancias","registros.distancia_id","=","distancias.id")
        ->join("tallas","registros.talla_id","=","tallas.id")
        ->join("planteles","registros.plantel_id","=","planteles.id")
        ->select('participantes.nombre','participantes.apellido','participantes.cedula','participantes.edad','participantes.sexo','grados.grado','direcciones.direccion','planteles.plantel','distancias.distancia','tallas.zapato','tallas.pantalon','tallas.camisa')->get();
>>>>>>> vilonk
    	return $registro;
    }
    public function registroCompletoById($id){
    	$registro = Registro::find($id);
        $n_competidor = $registro->n_competidor;
    	$participante = $registro->participante;
    	$grado = $participante->grado;
        $plantel = $registro->plantel;
    	$direccion = $registro->direcciones;
    	$distancia = $registro->distancia;
    	$talla = $registro->talla;
    	$registrosCompleto = [
            "n_competidor" => $n_competidor,
    		"nombre" => $participante->nombre,
    		"apellido" => $participante->apellido,
    		"cedula" => $participante->cedula,
    		"edad" => $participante->edad,
    		"sexo" => $participante->sexo,
    		"grado" => $grado->grado,
    		"direccion" => $direccion->direccion,
    		"plantel" => $plantel->plantel,
    		"distancia" => $distancia->distancia,
    		"tallaZapato" => $talla->zapato,
    		"tallaPantalon" => $talla->pantalon,
    		"tallaCamisa" => $talla->camisa,
    	];
    	return $registrosCompleto;
<<<<<<< HEAD
    }//registra al usuario segun su $id
=======
    }
    public function plantel(){
      return $this->belongsTo(Planteles::class);
    }
>>>>>>> vilonk
    public function distancia(){
      return $this->belongsTo(Distancia::class);
    }
    public function direcciones(){
      return $this->belongsTo(Direcciones::class);
    }
    public function participante(){
      return $this->belongsTo(Participante::class);
    }
    public function talla(){
        return $this->belongsTo(Talla::class);
    }

}
