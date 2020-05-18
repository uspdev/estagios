<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empresa;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {
    
    return [
        'nome' => $faker->company,
        'cnpj' => $faker->cnpj(false),
        'email' => $faker->email,
        'razao_social' => $faker->sentence,
        'area_de_atuacao' => $faker->sentence,
        'endereco' => $faker->streetAddress,
        'cep' => $faker->numberBetween(10000000, 99999999),
        'nome_de_contato' => $faker->name,
        'telefone_de_contato' => $faker->cellphoneNumber,
        'nome_do_representante' => $faker->name,
        'cargo_do_representante' => $faker->jobTitle,
        'nome_do_supervisor_estagio' => $faker->name,
        'cargo_do_supervisor_estagio' => $faker->jobTitle,
        'telefone_do_supervisor_estagio' => $faker->cellphoneNumber,
        'email_do_supervisor_estagio' => $faker->email
    ];
});
