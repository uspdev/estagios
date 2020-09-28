<?php

use Illuminate\Database\Seeder;
use App\Models\Convenio;
namespace Database\Seeders;

class ConvenioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $entrada = [
            'cnpj' => '29541003000114',
            'nome_representante' => 'Jose Antonio',
            'cargo_representante' => 'Professor',
            'email_representante' => 'josebdo@gmail.com',
            'rg_representante' => 505421235,
            'cpf_representante' => 483032112354,
            'nome_representante2' => 'Michel Jonas',
            'cargo_representante2' => 'Pesquisador',
            'email_representante2' => 'joninhasomal@hotmail.com',
            'rg_representante2' => 549203234,
            'cpf_representante2' => 43294802143,
            'descricao' => 'Atividades compativeis demais',
            'atividade' => 'Atividades legais demais',
            'nome_contato' => 'Josenaldo',
            'tel_contato' => 55432180,
            'email_contato' => 'nolomia@gmail.com'
    ];
 
    Convenio::create($entrada);
    convenio::factory(10)->create();
    }
}
