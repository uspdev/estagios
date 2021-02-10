<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Parecerista;

class PareceristaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entrada = [
            'numero_usp' => 2989060,
            'presidente' => 1
        ];
        
        Parecerista::create($entrada);
        Parecerista::factory(15)->create();
    }
}
