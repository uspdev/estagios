<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vaga;

class VagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entrada = [
            'titulo' => 'Vaga',
            'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'expediente' => 30,
            'salario' => 'R$ 1000,00',
            'horario' => '8h às 18h',
            'beneficios' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'divulgar_ate' => '2020-12-20',
            'status' => 'Aprovada',
            'justificativa' => 'Justificativa teste', 
            'email' => 'contato@vaga.com',
        ];
        
        Vaga::create($entrada);
        Vaga::factory(10)->create();
    }
}
