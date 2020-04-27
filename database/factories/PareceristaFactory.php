<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Parecerista;
use Faker\Generator as Faker;

$factory->define(Parecerista::class, function (Faker $faker) {
    $faker->addProvider(new \JansenFelipe\FakerBR\FakerBR($faker));

    return [
        'numero_usp' => $faker->unique()->numberBetween(10000, 999999),
        'nome' => $faker->name,
        'acesso_ate' => $faker->date,
    ];
});
