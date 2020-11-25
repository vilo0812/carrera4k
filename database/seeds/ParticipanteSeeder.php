<?php

use App\Participante;
use Illuminate\Database\Seeder;

class ParticipanteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Participante::create([
        'nombre' => 'gabriel',
        'apellido' => 'viloria',
        'cedula' => '27167028',
        'edad' => 21,
        'sexo' => 'masculino',
        'grado_id' => 1
        ]);
        factory(Participante::class, 10)->create();
    }
}
