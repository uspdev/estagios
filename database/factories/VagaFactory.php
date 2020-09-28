<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories;

use App\Models\Vaga;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class VagaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vaga::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cnpj' => Empresa::factory()->create()->cnpj, 
            'titulo' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'descricao' => $this->faker->text,
            'expediente' => $this->faker->buildingNumber,
            'salario' => $this->faker->buildingNumber,
            'horario' => $this->faker->time($format = 'H:i:s', $max = 'now'),
            'beneficios' => $this->faker->text,
            'divulgar_ate' =>$this->faker->dateTimeBetween($startDate = '-2 years',$endDate = '+ 2 years')->format('Y-m-d'),
        ];
    }
}
