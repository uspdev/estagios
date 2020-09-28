<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Aviso;


class AvisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entrada = [
            'titulo' => 'Exemplo de um aviso que deve aparecer na home',
            'corpo' => 'Mudanças nas regras de contratação de estagiários(as) devido ao COVID-19',
            'divulgacao_home_ate' => '2021-09-20',
        ];
  
        Aviso::create($entrada);
        Aviso::factory(10)->create();
    }
}
