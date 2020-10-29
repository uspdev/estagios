<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\File;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $entrada = [
            'original_name' => 'PDF de Teste',
            'path' => './tmp/PDFdeTeste.pdf',
            'estagio_id'  => '1',
            'user_id'  => '1',
    ];
 
    File::create($entrada);
    FIle::factory(40)->create();
    }
}
