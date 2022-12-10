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
            "Asus VivoBook 15 A516MAO-FHD423",
            "Acer Aspire 3 A314-35-C03Y",
            "Lenovo IdeaPad Slim 3 14IGL05",
            "HP 14s-fq0591AU",
            "MSI Modern 14 C11M",
            "DELL Vostro V3515-R53450U-8-512-U-W11-F-OH",
        ];
        foreach ($alternatif as $key => $value) {
            $no = $key + 1;
            Alternatif::insert([
                'kode' => 'A' . $no,
                'nama' => $value,
                'deskripsi' => "-"
            ]);
        }
    }
}
