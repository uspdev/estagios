<?php

use Illuminate\Database\Seeder;

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
            'razao_social' => 'Pluri Água',
            'cnpj' => '29541003000114',
            'area_de_atuacao' => 'Indústria',
            'endereco' => 'Rua dos Bobos',
            'cep' => '06318872',
            'nome_de_contato' => 'Joãozinho',
            'telefone_de_contato' => '1199999999',
            'email_de_contato' => 'contatointerno@empresa.com',
            'nome_do_representante' => 'Mariazinha',
            'cargo_do_representante' => 'Gestor',
            'nome_do_supervisor_estagio' => 'Genivaldo',
            'cargo_do_supervisor_estagio' => 'Gerente',
            'telefone_do_supervisor_estagio' => '1188888888',
            'email_do_supervisor_estagio' => 'geni@uol.com.br'
        ];
        App\Empresa::create($entrada);

        factory(App\Empresa::class, 10)->create();
    }
}
