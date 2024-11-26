<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Galery;
use App\Models\Foto;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Buat kategori
        $category = Category::create(['nama' => 'Kegiatan Sekolah']);

        // Buat galeri
        $galeri = Galery::create([
            'nama' => 'Kegiatan 2024',
            'kategori_id' => $category->id
        ]);

        // Buat foto
        Foto::create([
            'judul' => 'Foto Kegiatan 1',
            'foto' => 'default.jpg',
            'galeri_id' => $galeri->id
        ]);
    }
}
