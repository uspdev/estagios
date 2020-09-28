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
            'atividadespertinentes' => 'Parcialmente',
            'mediaponderada' => '7.5',
            'horariocompativel' => 'Sim, estágio realizado fora do horário do curso', 
            'desempenhoacademico' => 'Honestamente, podia ser bem melhor',                        
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
            'atividadesjustificativa' => 'Atuação no meio profissional de universidade e lidar com professores'  
        ];
      
        Estagio::create($entrada); 
        Estagio::factory(20)->create();
    }
}
