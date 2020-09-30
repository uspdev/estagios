<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empresa;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entrada = [
            'nome' => 'Pluriaqua',
            'email' => 'contato@empresa.com',
            'cnpj' => '29541003000114',
            'area_de_atuacao' => 'Indústria',
            'endereco' => 'Rua dos Bobos',
            'cep' => '06318872',
            'nome_do_representante' => 'Mariazinha',
            'cargo_do_representante' => 'Gestor',
        ];
       
        Empresa::create($entrada);
        Empresa::factory(10)->create();
    }
}
