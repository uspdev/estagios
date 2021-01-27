<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Estagio;

class EstagioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entrada = [
            'numero_usp' => 4308894,           
            'valorbolsa' => '1200',
            'tipobolsa' => 'Mensal',
            'justificativa' => 'Desenvolvimento PHP',
            'duracao' => '12 meses',                      
            'data_inicial' => '2020-03-12',
            'data_final' => '2021-03-12',
            'cargahoras' => '30',
            'cargaminutos' => '00',            
            'horario' => '07:00-13:00',  
            'auxiliotransporte' => '72',
            'especifiquevt' => 'Mensal',
            'cnpj' => '29541003000114',        
            'atividades' => 'Desenvolvimento e manutenção dos sistemas da FFLCH',
            'seguradora' => 'Porto Seguro', 
            'numseguro' => '120043',
            'controlehorario' => 'teste',
            'supervisao' => 'teste',
            'interacao' => 'teste',
            'enderecoedias' => 'teste',
            'status' => 'em_elaboracao',
            'pandemiahomeoffice' => 'Sim',
            'pandemiamedidas' => 'Alcool gel e cafezinho liberado',
            'nome_do_supervisor_estagio' => 'Genivaldo',
            'cargo_do_supervisor_estagio' => 'Gerente',
            'telefone_do_supervisor_estagio' => '1188888888',
            'email_do_supervisor_estagio' => 'geni@uol.com.br',
            'nome_de_contato' => 'Joãozinho',
            'email_de_contato' => 'contatointerno@empresa.com',
            'telefone_de_contato' => '1199999999',
            //
            'horariocompativel' => 'Sim, estágio realizado fora do horário do curso', 
            'desempenhoacademico' => 'Honestamente, podia ser bem melhor',  
            'atividadespertinentes' => 'Sim',  
            'atividadesjustificativa' => 'Atuação no meio profissional de universidade e lidar com professores',  
            'tipodeferimento' => 'Deferido',    
            'condicaodeferimento' => 'Não', 
            'analise_academica' => 'O estágio está de acordo com a área de estudo e atividade profissional do aluno.'
        ];
      
        Estagio::create($entrada); 
        Estagio::factory(20)->create();
    }
}
