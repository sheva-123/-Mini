<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TanamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tanamans')->insert([
            [
                'nama_tanaman' => 'Apel',
                'jenis' => 'Buah',
                'umur_panen' => '120',
                'deskripsi' => 'Buah apel adalah buah yang berasal dari pohon apel dan memiliki banyak manfaat kesehatan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_tanaman' => 'Jeruk',
                'jenis' => 'Buah',
                'umur_panen' => '128',
                'deskripsi' => 'Buah jeruk adalah buah sitrus yang memiliki rasa manis alami dan banyak manfaat untuk kesehatan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_tanaman' => 'Bayam',
                'jenis' => 'Sayuran',
                'umur_panen' => '50',
                'deskripsi' => 'Bayam adalah tumbuhan yang biasa ditanam untuk dikonsumsi daunnya sebagai sayuran hijau.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_tanaman' => 'Kubis',
                'jenis' => 'Sayuran',
                'umur_panen' => '110',
                'deskripsi' => 'Kubis atau kol adalah tumbuhan dwimusim atau ekamusim berdaun hijau atau ungu yang ditanam sebagai sayuran untuk kepala padat berdaunnya.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_tanaman' => 'Jahe',
                'jenis' => 'Herbal',
                'umur_panen' => '243',
                'deskripsi' => 'Jahe atau halia adalah tumbuhan yang rimpangnya sering digunakan sebagai rempah-rempah dan bahan baku pengobatan tradisional.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_tanaman' => 'Kunyit',
                'jenis' => 'Herbal',
                'umur_panen' => '212',
                'deskripsi' => 'Kunyit atau kunir adalah termasuk salah satu tanaman rempah-rempah dan obat asli dari wilayah Asia Tenggara.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
