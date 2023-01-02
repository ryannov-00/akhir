<?php

namespace Database\Seeders;

use App\Models\SubKriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                ['>30jt', '1'],
                ['21-30jt', '2'],
                ['11-20jt', '3'],
                ['6-10jt', '4'],
                ['3-5jt', '5'],
            ],
            [
                ['Low End', '1'],
                ['Mid Range', '2'],
                ['High End', '3'],
            ],
            [
                ['4GB', '1'],
                ['8GB', '2'],
                ['16GB', '3'],
                ['32GB', '4'],
                ['64GB', '5'],
            ],
            [
                ['13inch', '1'],
                ['14inch', '2'],
                ['15inch', '3'],
                ['16inch', '4'],
                ['17inch', '5'],
            ],
            [
                ['SSD 128GB', '1'],
                ['SSD 256GB', '2'],
                ['SSD 512GB', '3'],
                ['SSD 1000GB/1TB', '4'],
                ['SSD 2000GB/2TB', '5'],
                ['HDD 1000GB/1TB', '4'],
                ['HDD 2000GB/2TB', '5'],
            ],
            [
                ['Low End', '1'],
                ['Mid Range', '2'],
                ['High End', '3'],
            ],
            [
                ['No', '1'],
                ['Yes', '5'],
            ]
        ];

        foreach ($data as $key => $value) {
            $kriteria_id = $key + 1;
            foreach ($value as $key2 => $value2) {
                SubKriteria::insert([
                    'kriteria_id' => $kriteria_id,
                    'score' => $value2[1],
                    'nama' => $value2[0],
                ]);
            }
        }
    }
}
