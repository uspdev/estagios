<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories;

use App\Models\Convenio;
use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ConvenioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Convenio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
      return [
        'nome_representante' => $this->faker->name,
        'cargo_representante' => $this->faker->jobTitle ,
        'email_representante' => $this->faker->email,
        'rg_representante' => $this->faker->rg(false),
        'cpf_representante' => $this->faker->cpf(false),
        'nome_representante2' => $this->faker->name,
        'cargo_representante2' => $this->faker->jobTitle,
        'email_representante2' => $this->faker->email,
        'rg_representante2' => $this->faker->rg(false),
        'cpf_representante2' => $this->faker->cpf(false),
        'descricao' => $this->faker->text,
        'atividade' => $this->faker->text,
        'nome_contato' => $this->faker->name,
        'tel_contato' => $this->faker->cellphoneNumber,
        'email_contato' => $this->faker->email,
        'cnpj' => Empresa::factory()->create()->cnpj,
      ];
    }
}
