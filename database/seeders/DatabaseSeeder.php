<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
            FileSeeder::class,
        ]);
    }
}
