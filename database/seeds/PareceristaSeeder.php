<?php

use Illuminate\Database\Seeder;

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
        
        App\Parecerista::create($entrada1);
        App\Parecerista::create($entrada2);

        factory(App\Parecerista::class, 12)->create();
    }
}
