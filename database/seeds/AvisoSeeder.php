<?php

use Illuminate\Database\Seeder;

class AvisoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entrada = [
            'titulo' => 'Titulo Aviso',
            'corpo' => 'Mensagem',
            'divulgacao_home_ate' => '2020-09-20',
        ];
        App\Aviso::create($entrada);

        factory(App\Aviso::class, 100)->create();
    }
}
