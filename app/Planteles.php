<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planteles extends Model
{
     public $timestamps = false;
     public function registros(){
        return $this->hasMany(Registro::class);
    }
}
