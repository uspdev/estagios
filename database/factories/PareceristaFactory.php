<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Parecerista;
use Faker\Generator as Faker;

$factory->define(Parecerista::class, function (Faker $faker) {
    return [
        'numero_usp' => $faker->docente(),
    ];
});
