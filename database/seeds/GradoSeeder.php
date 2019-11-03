<?php

use App\Grado;
use Illuminate\Database\Seeder;

class GradoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grado::create([
        	'grado' => 'Inicial'
        ]);
        Grado::create([
            'grado' => '4to GRADO'
        ]);
        Grado::create([
            'grado' => '5to GRADO'
        ]);
        Grado::create([
            'grado' => '6to GRADO'
        ]);
        Grado::create([
            'grado' => '1er AÑO'
        ]);
        Grado::create([
            'grado' => '2do AÑO'
        ]);
        Grado::create([
            'grado' => '3er AÑO'
        ]);
        Grado::create([
            'grado' => '4to AÑO'
        ]);
        Grado::create([
            'grado' => '5to AÑO'
        ]);
        Grado::create([
            'grado' => '6to AÑO'
        ]);
    }
}
