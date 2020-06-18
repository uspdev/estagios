<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Aviso;
use Faker\Generator as Faker;

$factory->define(Aviso::class, function (Faker $faker) {

    return [
        'titulo' => $faker->sentence,
        'corpo' => $faker->sentence, 
        'divulgacao_home_ate' => $faker->dateTimeBetween($startDate = '-2 years',$endDate = '+ 2 years')->format('Y-m-d'),
    ];
});
