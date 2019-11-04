<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Direcciones;
use Faker\Generator as Faker;

$factory->define(Direcciones::class, function (Faker $faker) {
    return [
        'direcciones' => $faker->address,
        'plantel' => $faker->secondaryAddress
    ];
});
