<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories;

use App\Models\Empresa;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class EmpresaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Empresa::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->company,
            'cnpj' => $this->faker->cnpj(false),
            'email' => $this->faker->email,
            'area_de_atuacao' => $this->faker->sentence,
            'endereco' => $this->faker->streetAddress,
            'cep' => $this->faker->numberBetween(10000000, 99999999),
            'nome_do_representante' => $this->faker->name,
            'cargo_do_representante' => $this->faker->jobTitle,
        ];
    }
}
