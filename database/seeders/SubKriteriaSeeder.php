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
                ['Intel Pentium-Celeron', '1'],
                ['Inter Core i3', '2'],
                ['Inter Core i5', '3'],
                ['Inter Core i7', '4'],
                ['Inter Core i9', '5'],
            ],
            [
                ['2', '1'],
                ['4', '2'],
                ['8', '3'],
                ['16', '4'],
                ['32', '5'],
            ],
            [
                ['14', '1'],
                ['15', '2'],
                ['16', '3'],
                ['17', '4'],
                ['18', '5'],
            ],
            [
                ['128', '1'],
                ['256', '2'],
                ['512', '3'],
                ['1000', '4'],
                ['2000', '5'],
            ],
            [
                ['<=8 atau 1', '1'],
                ['9 atau 2', '2'],
                ['10 atau 3', '3'],
                ['11 atau 4', '4'],
                ['12 atau >5', '5'],
            ]
        ];
        
        foreach($data as $key => $value) {
            $kriteria_id = $key+1;
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
