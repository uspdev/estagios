<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories;

use App\Models\Parecerista;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class PareceristaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Parecerista::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numero_usp' => $this->faker->docente(),
        ];
    }
}
