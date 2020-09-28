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
        $entrada1 = [
            'numero_usp' => 5385361,
        ];
        $entrada2 = [
            'numero_usp' => 2989060,
            'presidente' => 1
        ];
        
        Parecerista::create($entrada1);
        Parecerista::create($entrada2);
        Parecerista::factory(15)->create();
    }
}
