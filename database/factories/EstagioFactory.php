<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories;

use App\Models\Estagio;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class EstagioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estagio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $bolsa = ['Mensal', 'Por Hora'];
        $vt = ['Mensal','Diário'];
        $atvpertinentes = ['Sim','Não','Parcialmente'];
        $deferimento = ['Deferido','Deferido com Restrição','Indeferido'];
        $homeoffice = ['Sim','Não'];
        $conddeferimento = ['Sim','Não'];
        $status = [
            'em_elaboracao',
            'em_analise_tecnica',
            'em_analise_academica',
            'concluido',
            'em_alteracao',
        ];

        return [
            //cadastro
            'cnpj' => Empresa::factory()->create()->cnpj, 
            'numero_usp' => $this->faker->unique()->graduacao(),           
            'valorbolsa' => $this->faker->numberBetween(300, 4000),
            'tipobolsa' => $bolsa[array_rand($bolsa)],
            'justificativa' => $this->faker->text($maxNbChars = 200),
            'duracao' => $this->faker->numberBetween(12, 24),          
            'atividadespertinentes' => $atvpertinentes[array_rand($atvpertinentes)],
            'horariocompativel' => $this->faker->text($maxNbChars = 100),
            'desempenhoacademico' => $this->faker->text($maxNbChars = 200),              
            'data_inicial' => $this->faker->date,
            'data_final' => $this->faker->date,
            'cargahoras' => $this->faker->numberBetween(00, 23),
            'cargaminutos' => $this->faker->numberBetween(00, 59),            
            'horario' => $this->faker->time($format = 'H:i', $max = 'now'), 
            'auxiliotransporte' => $this->faker->numberBetween(10, 300),
            'especifiquevt' => $vt[array_rand($vt)],       
            'atividades' => $this->faker->text($maxNbChars = 200),
            'seguradora' => $this->faker->company, 
            'numseguro' => $this->faker->unique()->numberBetween(1000, 100000), 
            'controlehorario' => $this->faker->text($maxNbChars = 200),
            'supervisao' => $this->faker->text($maxNbChars = 200),
            'interacao' => $this->faker->text($maxNbChars = 200),
            'enderecoedias' => $this->faker->text($maxNbChars = 200),
            'status' => $status[array_rand($status)],
            'pandemiahomeoffice' => $homeoffice[array_rand($homeoffice)], 
            'pandemiamedidas' => $this->faker->text($maxNbChars = 200),
            'nome_do_supervisor_estagio' => $this->faker->name,
            'cargo_do_supervisor_estagio' => $this->faker->jobTitle,
            'telefone_do_supervisor_estagio' => $this->faker->cellphoneNumber,
            'email_do_supervisor_estagio' => $this->faker->email,
            'nome_de_contato' => $this->faker->name,
            'email_de_contato' => $this->faker->email,
            'telefone_de_contato' => $this->faker->cellphoneNumber,
            //avaliação do parecerista
            'horariocompativel' => $this->faker->text($maxNbChars = 200), 
            'desempenhoacademico' => $this->faker->text($maxNbChars = 200),  
            'atividadespertinentes' => $atvpertinentes[array_rand($atvpertinentes)],   
            'atividadesjustificativa' => $this->faker->text($maxNbChars = 200),
            'tipodeferimento' => $deferimento[array_rand($deferimento)],    
            'condicaodeferimento' => $conddeferimento[array_rand($conddeferimento)], 
        ];
    }
}

