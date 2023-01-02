<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriteria = [
            ["K1", "K2", "K3", "K4", "K5", "K6", "K7"],
            ["Harga", "Prosesor ", "RAM", "Ukuran Layar", "Penyimpanan", "VGA/GPU", "Jenis Layar"],
            ["Cost", "Benefit", "Benefit", "Benefit", "Benefit", "Benefit", "Benefit"],
            [0.2, 0.2, 0.1, 0.15, 0.1, 0.1, 0.15],
            [5, 6, 6, 7, 5, 5, 5],
            [1, 1, 2, 1, 1, 1, 1],
        ];
        for ($i = 0; $i < 7; $i++) {
            Kriteria::insert([
                'kode' => $kriteria[0][$i],
                'nama' => $kriteria[1][$i],
                'atribut' => $kriteria[2][$i],
                'bobot' => $kriteria[3][$i],
                'max' => $kriteria[4][$i],
                'min' => $kriteria[5][$i],
            ]);
        }
    }
}
