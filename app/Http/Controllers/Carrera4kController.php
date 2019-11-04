<?php

namespace App\Http\Controllers;

use App\Direcciones;
use App\Participante;
use App\Registro;
use App\Talla;
use Faker\Generator as Faker;
use Illuminate\Http\Request;
class Carrera4kController extends Controller
{
    public function index() {
	  return view('app');
	  }
	public function registrar(Faker $faker){
		$registrosCompleto = [
    		'nombre' => $faker->firstname,
	        'apellido' => $faker->lastname,
	        'cedula' => $faker->randomNumber(7),
	        'edad' => $faker->randomNumber(2),
	        'sexo' => $faker->randomElement(['masculino','femenino']),
    		"grado_id" => $faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
    		'direccion' => $faker->address,
        	'plantel' => $faker->secondaryAddress,
        	'distancia_id' => $faker->randomElement([1,2,3]),
    		 'zapato' => $faker->randomNumber(2),
        	'pantalon' => $faker->randomNumber(2),
        	'camisa' => $faker->randomNumber(2)
    	];
    	$participante = new Participante();
    	$participante->nombre = $registrosCompleto['nombre'];
    	$participante->apellido = $registrosCompleto['apellido'];
    	$participante->cedula = $registrosCompleto['cedula'];
    	$participante->edad = $registrosCompleto['edad'];
    	$participante->sexo = $registrosCompleto['sexo'];
    	$participante->grado_id = $registrosCompleto['grado_id'];
    	$participante->save();
    	$participante_id = $participante->id;
    	$direccion = new Direcciones();
    	$direccion->direcciones = $registrosCompleto['direccion'];
    	$direccion->plantel = $registrosCompleto['plantel'];
    	$direccion->save();
    	$direccion_id = $direccion->id;
    	$tallas = new Talla();
    	$tallas->zapato = $registrosCompleto['zapato'];
    	$tallas->pantalon = $registrosCompleto['pantalon'];
    	$tallas->camisa = $registrosCompleto['camisa'];
    	$tallas->save();
    	$tallas_id = $tallas->id;
    	$registro = new Registro();
    	$registro->distancia_id = $registrosCompleto['distancia_id'];
    	$registro->participante_id = $participante_id;
    	$registro->direcciones_id = $direccion_id;
    	$registro->talla_id = $tallas_id;
    	return $registro;
	}
	public function mostrar(){
		$id = Registro::get();
		$registro = new Registro();
		// return $registro->RegistrosCompletos($id->id);
		return $id;
	}
}
