<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Participante;
use Faker\Generator as Faker;

$factory->define(Participante::class, function (Faker $faker) {
    return [
		'nombre' => $faker->firstname,
        'apellido' => $faker->lastname,
        'cedula' => $faker->randomNumber(7),
        'edad' => $faker->randomNumber(2),
        'sexo' => $faker->randomElement(['masculino','femenino']),
        'grado_id' => $faker->randomElement([1,2,3,4,5,6,7,8,9,10])
    ];
});
