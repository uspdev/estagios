<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Estagio;
use Faker\Generator as Faker;

$factory->define(Estagio::class, function (Faker $faker) {
    
    return [
        'numero_usp' => $faker->unique()->graduacao(),           
        'valorbolsa' => $faker->numberBetween(300, 4000),
        'tipobolsa' => 'Mensal',
        'justificativa' => 'Desenvolvimento PHP e outros',
        'duracao' => $faker->numberBetween(12, 24),           
        'data_inicial' => $faker->date,
        'data_final' => $faker->date,
        'cargahoras' => $faker->numberBetween(00, 23),
        'cargaminutos' => $faker->numberBetween(00, 59),            
        'horario' => $faker->time($format = 'H:i', $max = 'now'), 
        'auxiliotransporte' => $faker->numberBetween(10, 300),
        'especifiquevt' => 'Mensal',
        'cnpj' => $faker->cnpj,            
        'atividades' => 'Desenvolvimento e manutenção dos sistemas da FFLCH',
        'seguradora' => $faker->company, 
        'numseguro' => $faker->unique()->numberBetween(1000, 100000), 
    ];
});
