<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Convenio;
use Faker\Generator as Faker;


$factory->define(Convenio::class, function (Faker $faker) {
	

    return [
       'nome_representante' => $faker->name,
         'cargo_representante' => $faker->jobTitle ,
         'email_representante' => $faker->email,
         'rg_representante' => $faker->rg(false),
         'cpf_representante' => $faker->cpf(false),
         'nome_representante2' => $faker->name,
         'cargo_representante2' => $faker->jobTitle,
         'email_representante2' => $faker->email,
         'rg_representante2' => $faker->rg(false),
         'cpf_representante2' => $faker->cpf(false),
         'desc' => $faker->text,
         'ativ' => $faker->text,
         'nome_contato' => $faker->name,
         'tel_contato' => $faker->unique()->numberBetween(1111111111, 9999999999),
         'email_contato' => $faker->email
    ];
});
