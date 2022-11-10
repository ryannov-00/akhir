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
            ["k1", "k2", "k3", "k4", "k5", "k6"],
            ["Harga", "Prosesor ", "RAM", "Uk. Layar", "Penyimpanan", "Gen. Prosesor"],
            ["Cost", "Benefit", "Benefit", "Benefit", "Benefit", "Benefit"],
            [0.08, 0.2, 0.2, 0.16, 0.16, 0.12, 0.08],
            [5, 3, 4, 2, 3, 4],
            [4, 2, 2, 1, 2, 3],
        ];
        for ($i=0; $i < 6; $i++) {
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
