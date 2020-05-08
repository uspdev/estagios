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
            'nome_da_empresa' => 'Pluriaqua',
            'cnpj_da_empresa' => '29541003000114',
            'area_de_atuacao_da_empresa' => 'Indústria',
            'endereco_da_empresa' => 'Rua dos Bobos',
            'nome_de_contato_da_empresa' => 'Joãozinho',
            'email_de_contato_da_empresa' => 'joao@gmail.com',
            'telefone_de_contato_da_empresa' => '1199999999',
            'nome_do_representante_da_empresa' => 'Mariazinha',
            'cargo_do_representante_da_empresa' => 'Gestor',
            'nome_do_supervisor_do_estagio' => 'Genivaldo',
            'cargo_do_supervisor_do_estagio' => 'Gerente',
            'telefone_do_supervisor_do_estagio' => '1188888888',
            'email_do_supervisor_do_estagio' => 'geni@uol.com.br'
        ];
        App\Empresa::create($entrada);

        factory(App\Empresa::class, 100)->create();
    }
}
