<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Registro;
use Faker\Generator as Faker;

$factory->define(Registro::class, function (Faker $faker) {
    return [
    	'n_competidor' =>$faker->randomNumber(2),
    	'plantel_id' =>$faker->randomNumber(2),
    	'distancia_id' =>$faker->randomElement([1,2,3]),
    	'participante_id' =>$faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
    	'direcciones_id' =>$faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
    	 'talla_id' =>$faker->randomElement([1,2,3,4,5,6,7,8,9,10])


    ];
});
