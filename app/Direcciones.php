<?php

namespace App;

use App\Participante;
use App\Registro;
use App\Talla;
use Illuminate\Database\Eloquent\Model;

class Direcciones extends Model
{
public $timestamps = false;
public function registros(){
        return $this->hasMany(Registro::class);
    }
    public function participantes(){
        return $this->belongsToMany(Participante::class,'registros');
    }
    public function tallas(){
        return $this->belongsToMany(Talla::class,'registros');
    }
    public function distancias(){
        return $this->belongsToMany(Distancia::class,'registros');
    }

}

