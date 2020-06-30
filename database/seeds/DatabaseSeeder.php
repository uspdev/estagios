<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            PareceristaSeeder::class,
            EmpresaSeeder::class,
            EstagioSeeder::class,
            ConvenioSeeder::class,
            AvisoSeeder::class,
            VagaSeeder::class,
        ]);

    }
}
