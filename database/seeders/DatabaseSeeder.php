<?php

namespace Database\Seeders;

use App\Models\Surat;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Http\UploadedFile;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        for ($i=0; $i < 10; $i++) { 
            Surat::create([
                'nomor' => $faker->numerify('2021/PD02/TU/###'),
                'judul' => $faker->sentence(3),
                'kategori' => $faker->randomElement(['Undagan', 'Nota Dinas','Pemberitahuan', 'Pengumuman']),
                'file' => UploadedFile::fake()->create('file.pdf'),
            ]);
        }
    }
}
