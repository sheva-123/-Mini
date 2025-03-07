<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PertanianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tanamanId = DB::table('tanamans')->pluck('id');

        if ($tanamanId->isEmpty()) {
            return;
        }

        DB::table('pertanians')->insert([
            [
                'nama_pertanian' => 'Lahan Pertama',
                'lokasi_pertanian' => 'Malang',
                'luas_lahan' => '70',
                'tanaman_id' => $tanamanId->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pertanian' => 'Lahan Kedua',
                'lokasi_pertanian' => 'Probolinggo',
                'luas_lahan' => '50',
                'tanaman_id' => $tanamanId->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pertanian' => 'Lahan Ketiga',
                'lokasi_pertanian' => 'Kediri',
                'luas_lahan' => '90',
                'tanaman_id' => $tanamanId->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_pertanian' => 'Lahan Keempat',
                'lokasi_pertanian' => 'Lumajang',
                'luas_lahan' => '40',
                'tanaman_id' => $tanamanId->random(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
