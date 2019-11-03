<?php

namespace App;

use App\Participante;
use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
    public $timestamps = false;
    public function participantes(){
        return $this->hasMany(Participante::class);
    }
}
