<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories;

use App\Models\Aviso;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class AvisoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Aviso::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence,
            'corpo' => $this->faker->sentence, 
            'divulgacao_home_ate' => $this->faker->dateTimeBetween($startDate = '-2 years',$endDate = '+ 2 years')->format('Y-m-d'),
        ];
    }
}
