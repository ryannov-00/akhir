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
                ['>20jt', '2'],
                ['>15jt', '3'],
                ['>10jt', '4'],
                ['>5jt', '5'],
            ],
            [
                ['1000-5000', '1'],
                ['5500-10000', '2'],
                ['10001-15000', '3'],
                ['15001-20000', '4'],
                ['20001-25000', '5'],
                ['>25000', '6'],
            ],
            [
                ['2GB', '1'],
                ['4GB', '2'],
                ['8GB', '3'],
                ['16GB', '4'],
                ['32GB', '5'],
                ['64GB', '6'],
            ],
            [
                ['11inch', '1'],
                ['12inch', '2'],
                ['13inch', '3'],
                ['14inch', '4'],
                ['15inch', '5'],
                ['16inch', '6'],
                ['17inch', '7'],
            ],
            [
                ['128GB', '1'],
                ['256GB', '2'],
                ['512GB', '3'],
                ['1000GB/1TB', '4'],
                ['2000GB/2TB', '5'],
            ],
            [
                ['100-500', '1'],
                ['501-1000', '2'],
                ['1001-2000', '3'],
                ['2001-3000', '4'],
                ['>3000', '5'],
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
