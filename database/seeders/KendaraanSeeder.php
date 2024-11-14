<?php

namespace Database\Seeders;

use App\Models\KendaraanModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nomor_polisi' => 'B1234ABC',
                'merk' => 'Toyota',
                'model' => 'Automatic ',
                'tahun_produksi' => 2020,
                'jenis' => 'Mobil',
                'kapasitas_tangki' => 45,
                'jarak_tempuh_total' => 50000
            ],
            [
                'nomor_polisi' => 'D5678XYZ',
                'merk' => 'Honda',
                'model' => 'Automatic',
                'tahun_produksi' => 2018,
                'jenis' => 'Mobil',
                'kapasitas_tangki' => 47,
                'jarak_tempuh_total' => 30000
            ],
            [
                'nomor_polisi' => 'A9123DEF',
                'merk' => 'Suzuki',
                'model' => 'Manual',
                'tahun_produksi' => 2019,
                'jenis' => 'Mobil',
                'kapasitas_tangki' => 42,
                'jarak_tempuh_total' => 40000
            ],
            [
                'nomor_polisi' => 'F2345GHI',
                'merk' => 'Nissan',
                'model' => 'Automatic',
                'tahun_produksi' => 2021,
                'jenis' => 'Mobil',
                'kapasitas_tangki' => 41,
                'jarak_tempuh_total' => 15000
            ],
            [
                'nomor_polisi' => 'H6789JKL',
                'merk' => 'Mitsubishi',
                'model' => 'Automatic',
                'tahun_produksi' => 2022,
                'jenis' => 'Motor',
                'kapasitas_tangki' => 45,
                'jarak_tempuh_total' => 12000
            ],
            [
                'nomor_polisi' => 'B3333MMM',
                'merk' => 'Toyota',
                'model' => 'Manual',
                'tahun_produksi' => 2021,
                'jenis' => 'Mobil',
                'kapasitas_tangki' => 65,
                'jarak_tempuh_total' => 10000
            ],
            [
                'nomor_polisi' => 'D8888ZZZ',
                'merk' => 'Honda',
                'model' => 'Manual',
                'tahun_produksi' => 2020,
                'jenis' => 'Mobil',
                'kapasitas_tangki' => 42,
                'jarak_tempuh_total' => 32000
            ],
            [
                'nomor_polisi' => 'A1111YYY',
                'merk' => 'Suzuki',
                'model' => 'Manual',
                'tahun_produksi' => 2017,
                'jenis' => 'Mobil',
                'kapasitas_tangki' => 43,
                'jarak_tempuh_total' => 27000
            ],
            [
                'nomor_polisi' => 'F5555GGG',
                'merk' => 'Nissan',
                'model' => 'Automatic',
                'tahun_produksi' => 2019,
                'jenis' => 'Motor',
                'kapasitas_tangki' => 52,
                'jarak_tempuh_total' => 45000
            ],
            [
                'nomor_polisi' => 'H6666HHH',
                'merk' => 'Mitsubishi',
                'model' => 'Automatic',
                'tahun_produksi' => 2022,
                'jenis' => 'Motor',
                'kapasitas_tangki' => 70,
                'jarak_tempuh_total' => 13000
            ],
            [
                'nomor_polisi' => 'B7777CCC',
                'merk' => 'Toyota',
                'model' => 'Automatic',
                'tahun_produksi' => 2019,
                'jenis' => 'Mobil',
                'kapasitas_tangki' => 42,
                'jarak_tempuh_total' => 25000
            ],
        ];

        foreach ($data as $kendaraan) {
            KendaraanModel::create($kendaraan);
        }

    }
}
