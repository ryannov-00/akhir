<?php

namespace Database\Seeders;

use App\Models\AlternatifKriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AlternatifKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [4, 3, 4, 2, 3, 3],
            [4, 3, 4, 1, 3, 4],
            [4, 3, 2, 1, 3, 4],
            [5, 2, 2, 1, 2, 4],
            [4, 3, 4, 2, 3, 4],
        ];
        foreach ($data as $key_a => $value) {
            $no_key_a = $key_a + 1;
            foreach($value as $key_k => $nilai) {
                $no_key_k = $key_k + 1;
                AlternatifKriteria::insert([        
                        'alternatif_id' => $no_key_a,
                        'kriteria_id' => $no_key_k,
                        'nilai' => $nilai
                ]);
            }
        }
    }
}
