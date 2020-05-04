<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empresa;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {
    $faker->addProvider(new \JansenFelipe\FakerBR\FakerBR($faker));
    return [
        'nome_da_empresa' => $faker->company,
        'cnpj_da_empresa' => $faker->cnpj,
        'area_de_atuacao_da_empresa' => $faker->catchPhrase,
        'endereco_da_empresa' => $faker->streetAddress,
        'nome_de_contato_da_empresa' => $faker->name,
        'email_de_contato_da_empresa' => $faker->email,
        'telefone_de_contato_da_empresa' => $faker->tollFreePhoneNumber,
        'nome_do_representante_da_empresa' => $faker->name,
        'cargo_do_representante_da_empresa' => $faker->jobTitle,
        'nome_do_supervisor_do_estagio' => $faker->name,
        'cargo_do_supervisor_do_estagio' => $faker->jobTitle,
        'telefone_do_supervisor_do_estagio' => $faker->tollFreePhoneNumber,
        'email_do_supervisor_do_estagio' => $faker->email
    ];
});
