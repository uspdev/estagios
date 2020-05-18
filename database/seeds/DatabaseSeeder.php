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
            AvisoSeeder::class,
            VagaSeeder::class,
            PareceristaSeeder::class,
            EstagioSeeder::class,
            ConvenioSeeder::class,
        ]);

    }
}
