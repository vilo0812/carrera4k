<?php

namespace App;

use App\Direcciones;
use App\Participante;
use App\Registro;
use App\Talla;
use Illuminate\Database\Eloquent\Model;

class Distancia extends Model
{
public $timestamps = false;
public function registros(){
        return $this->hasMany(Registro::class);
    }
    public function direcciones(){
        return $this->belongsToMany(Direcciones::class,'registros');
    }
    public function participantes(){
        return $this->belongsToMany(Participante::class,'registros');
    }
    public function tallas(){
        return $this->belongsToMany(Talla::class,'registros');
    }
}
