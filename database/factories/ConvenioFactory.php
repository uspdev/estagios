<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Convenio;
use Faker\Generator as Faker;


$factory->define(Convenio::class, function (Faker $faker) {

    return [
       'nome_rep' => $faker->name,
         'cargo_rep' => $faker->jobTitle ,
         'email_rep' => $faker->email,
         'rg_rep' => $faker->unique()->numberBetween(100000000, 999999999),
         'cpf_rep' => $faker->cpf,
         'nome_rep2' => $faker->name,
         'cargo_rep2' => $faker->jobTitle,
         'email_rep2' => $faker->email,
         'rg_rep2' => $faker->unique()->numberBetween(100000000, 999999999),
         'cpf_rep2' => $faker->cpf,
         'desc' => $faker->text,
         'ativ' => $faker->text,
         'nome_cont' => $faker->name,
         'tel_cont' => $faker->unique()->numberBetween(1111111111, 9999999999),
         'email_cont' => $faker->email
    ];
});
