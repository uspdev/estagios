<?php

use Illuminate\Database\Seeder;

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
         'nome_rep' => 'Jose Antonio',
         'cargo_rep' => 'Professor',
         'email_rep' => 'josebolado@gmail.com',
         'rg_rep' => 505421235,
         'cpf_rep' => 483032112354,
         'nome_rep2' => 'Michel Jonas',
         'cargo_rep2' => 'Pesquisador',
         'email_rep2' => 'joninhasomal@hotmail.com',
         'rg_rep2' => 549203234,
         'cpf_rep2' => 43294802143,
         'desc' => 'Atividades compativeis demais',
         'ativ' => 'Atividades legais demais',
         'nome_cont' => 'Josenaldo',
         'tel_cont' => 55432180,
         'email_cont' => 'naldoaltoemcima@gmail.com'
    ];
    App\Convenio::create($entrada);

    factory(App\Convenio::class, 100)->create();
    }
}
