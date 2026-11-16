<?php

namespace Database\Seeders;

use App\Models\Inventaris;
use Illuminate\Database\Seeder;

class InventarisSeeder extends Seeder
{
    public function run(): void
    {
        
        Inventaris::create([
            'nama_barang' => 'Meja belajar',
            'jumlah'      => 2,
            'kondisi'     => 'Baik',
            'keterangan'  => 'Kamar lantai 2',
        ]);

        Inventaris::create([
            'nama_barang' => 'Kasur',
            'jumlah'      => 3,
            'kondisi'     => 'Rusak Ringan',
            'keterangan'  => 'Kamar lantai 1',
        ]);

        Inventaris::create([
            'nama_barang' => 'Lemari',
            'jumlah'      => 1,
            'kondisi'     => 'Baik',
            'keterangan'  => 'Kamar pojok',
        ]);

        Inventaris::create([
            'nama_barang' => 'Kipas angin',
            'jumlah'      => 2,
            'kondisi'     => 'Baik',
            'keterangan'  => 'Kamar lantai 2',
        ]);
    }
}