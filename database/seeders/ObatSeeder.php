<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Obat;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mengisi data awal untuk tabel obat
        for($i = 1; $i <= 10; $i++) {
            Obat::create([
                'nama_obat' => 'Obat '. $i,
                'keterangan' => 'Keterangan untuk Obat ' . $i,
                'harga' => rand(10000, 50000),
                'foto' => null,
                'stok' => rand(1, 100),
            ]);
        }
    }
}
