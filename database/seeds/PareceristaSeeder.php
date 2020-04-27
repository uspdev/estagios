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
        $entrada = [
            'numero_usp' => 5385361,
            'nome' => 'Thiago Gomes Veríssimo',
            'acesso_ate' => '2020-10-10' 
        ];
        App\Parecerista::create($entrada);

        factory(App\Parecerista::class, 100)->create();
    }
}
