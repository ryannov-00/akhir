<?php

namespace Database\Seeders;

use App\Models\Alternatif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternatifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alternatif = [
            "ASUS TUF Gaming F15",
            "ACER Swift 3x SF314",
            "HP 14s - dq2053TU",
            "Lenovo Thinkbook 14 G2",
            "MSI GF63 Thin 11SC",
        ];
        foreach($alternatif as $key => $value) {
            $no = $key+1;
            Alternatif::insert([
                'kode' => 'A'.$no,
                'nama' => $value,
                'deskripsi' => "-"
            ]);
        }
    }
}
