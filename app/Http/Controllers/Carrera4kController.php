<?php

namespace App\Http\Controllers;

use App\Direcciones;
use App\Distancia;
use App\Exports\ParticipantesExport;
use App\Exports\RegistroPersonalExport;
use App\Exports\RegistroPersonalizadoExport;
use App\Exports\Registros4KExport;
use App\Exports\RegistrosExport;
use App\Exports\RegistrosMCAExport;
use App\Exports\RegistrosVMExport;
use App\Participante;
use App\Planteles;
use App\Registro;
use App\Talla;
use Faker\Generator as Faker;
use Illuminate\Http\Request;
// use Maatwebsite\Excel\Facades\Excel;
class Carrera4kController extends Controller
{
    public function index() {
	  return view('app');
	  }
    public function planteles(){
        return Planteles::pluck('plantel');
    }
	public function registrar(Request $registrosCompleto){
        /////////////////////////////
        //registro que asigna un numero de competicion al participante y lo registra
        ////////////////////////////
    	$participante = new Participante();
    	$participante->nombre = $registrosCompleto['nombre'];
    	$participante->apellido = $registrosCompleto['apellido'];
    	$participante->cedula = $registrosCompleto['cedula'];
    	$participante->edad = $registrosCompleto['edad'];
    	$participante->sexo = $registrosCompleto['sexo'];
    	$participante->grado_id = $registrosCompleto['grado_id'];
    	$participante->save();//guardamos al participante
    	$participante_id = $participante->id;//sacamos el id del participante
    	$direccion = new Direcciones();
    	$direccion->direccion = $registrosCompleto['direccion'];
    	$direccion->save();//registramos la direccion
    	$direccion_id = $direccion->id;//sacamos el id de la direccion
    	$tallas = new Talla();
    	$tallas->zapato = $registrosCompleto['zapato'];
    	$tallas->pantalon = $registrosCompleto['pantalon'];
    	$tallas->camisa = $registrosCompleto['camisa'];
    	$tallas->save();//registramos la talla
    	$talla_id = $tallas->id;//sacamos el id de la talla
        $plantel = Planteles::wherePlantel($registrosCompleto['plantel'])->value('id');//sacamos el id que le pertenece a el plantel que el usuario selecciono, ya que el id es lo que vamos a registrar
        $distancia_id = $registrosCompleto['distancia_id'];//sacamos el id de la distancia
        $n_competidor = $registro = Registro::wherePlantel_id($plantel)->whereDistancia_id($distancia_id)->get()->last();//sacamos el ultimo registro en el cual se hayan inscrito los participantes de la misma entidad publica y en la misma distancia de carrera
        if($n_competidor->n_competidor == null){//verificamos el numero de competicion y le asigamos el siguiente numero de carrera
            $n_competidor = 1;
        }else{
            $n_competidor = $n_competidor->n_competidor + 1;
        }
        $registro = new Registro();
        $registro->n_competidor = $n_competidor;
        $registro->plantel_id = $plantel;
        $registro->distancia_id = $distancia_id;
        $registro->participante_id = $participante_id;
    	$registro->direcciones_id = $direccion_id;
    	$registro->talla_id = $talla_id;//llenamos el objeto
        $registro->save();//registramos
    	return $registro;
	}
	public function mostrar(){//al final no la utilizamos //api ref que me permite mostrar toda la informacion de la base de datos
        $registro = new Registro();
        $todos = Registro::all();
        $resultado=[];
        foreach ($todos as $registros => $registro) {//vamos a llamar al metodo registroCompletoById por cada id de registros, de esta manera almacenaremos un array gigante con todos los valores de los registros de la base de datos
        $array =$registro->registroCompletoById($registro->id);
        array_push($resultado,$array);
        }
        return $resultado;
    }
    public function descargarTodo(){
        //$todo=$this->mostrar();
        // return Excel::download(new ParticipantesExport, 'participantes.xlsx');
        return (new RegistrosExport)->download('registros.xlsx');
        //return Excel::download(new RegistrosExport, 'registros.xlsx');
    }
    public function descargarMCA(){
        return (new RegistrosMCAExport)->download('registrosMCA.xlsx');
    }
    public function descargarVM(){
        return (new RegistrosVMExport)->download('registrosVM.xlsx');
    }
    public function descargar4K(){
        return (new Registros4KExport)->download('registros4K.xlsx');
    }
    /*public function descargaPersonalizada(Request $personal){
        return (new RegistroPersonalExport($personal['distancia'],$personal['plantel']))->download('registroPersonal.xlsx');
    }*/
    public function descargaP(Request $datos){
        $plantel = Planteles::wherePlantel($datos['plantel'])->value('id');
        $distancia =  Distancia::whereDistancia($datos['distancia'])->value('id');
        return (new RegistroPersonalExport($distancia,$plantel))->download('registroPersonal.xlsx');
    }
}
