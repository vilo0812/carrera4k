<?php

namespace App;

use App\Direcciones;
use App\Distancia;
use App\Grado;
use App\Talla;
use Illuminate\Database\Eloquent\Model;

class Participante extends Model
{
   public $timestamps = false;

   public function grado(){
      return $this->belongsTo(Grado::class);
    }

   public function tallas(){
        return $this->belongsToMany(Talla::class,'registros');
    }
    public function direcciones(){
        return $this->belongsToMany(Direcciones::class,'registros');
    }
    public function distancias(){
        return $this->belongsToMany(Distancia::class,'registros');
    }
}
