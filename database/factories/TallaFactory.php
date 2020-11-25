<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Talla;
use Faker\Generator as Faker;

$factory->define(Talla::class, function (Faker $faker) {
    return [
        'zapato' => $faker->randomNumber(2),
        'pantalon' => $faker->randomNumber(2),
        'camisa' => $faker->randomNumber(2)
    ];
});
