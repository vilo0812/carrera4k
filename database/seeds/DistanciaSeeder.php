<?php

use App\Distancia;
use Illuminate\Database\Seeder;

class DistanciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Distancia::create([
        	'distancia' => 'Mini Carrera Atlética'
        ]);
        Distancia::create([
        	'distancia' => 'Vuelta a la Manzana'
        ]);
        Distancia::create([
        	'distancia' => '4k'
        ]);
    }
}
