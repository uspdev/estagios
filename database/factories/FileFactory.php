<?php

namespace Database\Factories;

use App\Models\File;
use App\Models\Estagio;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Faker\Provider\File as Files;

class FileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = File::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        //número baseado na quantidade de entradas que o factory de estágios gera
        $id = $this->faker->numberBetween(2, 21);

        return [
            'original_name' => $this->faker->text($maxNbChars = 25), 
            'path' => $this->faker->file('./storage/app'),        
            'estagio_id'  => $id,
            'user_id'  => $id,  
        ];
    }
}
