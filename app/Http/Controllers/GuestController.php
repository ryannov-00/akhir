<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\AlternatifKriteria;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index($laptop = null)
    {
        $kriteria = Kriteria::with('subKriteria')->get();
        // dd($kriteria);
        return view('guest', compact('kriteria', 'laptop'));
    }
    public function filter(Request $request)
    {
        $kriteria = Kriteria::get();
        $output = [];
        foreach ($kriteria as $value) {
            $kode = $value->kode;
            $id = $request->$kode;
            $subKriteria = SubKriteria::where('kriteria_id', $value->id)->where('id', $id)->first();
            if ($subKriteria) {
                $output[$value->id] = $subKriteria->score;
            }
        }

        $alternatif = Alternatif::get();
        $hasil = [];
        foreach ($alternatif as $key => $value) {
            // $alternatifKriteria = AlternatifKriteria::where('alternatif_id', $value->id)->where(function ($query) use ($output) {
            //     foreach ($output as $key => $value) {
            //         $query->where('kriteria_id', $key)->where('nilai', $value);
            //     }
            // })->first();
            $check = true;
            $kriteria = Kriteria::get();
            foreach ($kriteria as $key1 => $value1) {
                $nilai = $output[$value1->id];
                $alternatifKriteria = AlternatifKriteria::where('alternatif_id', $value->id)->where('kriteria_id', $value1->id)->where('nilai', $nilai)->first();
                if (!$alternatifKriteria) {
                    $check = false;
                }
            }
            if ($check) {
                $hasil[] = $value->id;
            }
        }
        $laptop = Alternatif::whereIn('id', $hasil)->orderBy('ranking')->get();
        // $text = '<table>';
        // $ranking = 1;
        // foreach($laptop as $value) {
        //     $text .= '<tr><td>Nama</td><td>'.$value->nama.'</td></tr>';
        //     $text .= '<tr><td>Ranking</td><td>'.$ranking.'</td></tr>';

        //     $text .= '</tr>';
        //     $ranking++;
        // }
        // $text .= '</table>';
        return GuestController::index($laptop);
    }
}
