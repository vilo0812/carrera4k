<?php

namespace App;

use App\Participante;
use App\Registro;
use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
   public $timestamps = false;
   public function registros(){
        return $this->hasMany(Registro::class);
    }
    public function participantes(){
        return $this->belongsToMany(Participante::class,'registros');
    }
    public function direcciones(){
        return $this->belongsToMany(Direcciones::class,'registros');
    }
    public function distancias(){
        return $this->belongsToMany(Distancia::class,'registros');
    }
}
