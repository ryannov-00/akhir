<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\AlternatifKriteria;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function test() {
        // dd(Kriteria::where('id', 1)->get());
        // $alternatifKriteria = AlternatifKriteria::where('alternatif_id', 1)->get();
        // dd($alternatifKriteria);
        $alternatif = Alternatif::get();
        dd($alternatif);
        return view('perhitungan.index');
    }
    public function index() {
        PerhitunganController::matriksNormalisasi();
        PerhitunganController::normalisasiBobot();
        PerhitunganController::utilityMeasure();
        PerhitunganController::regrateMeasure();
        PerhitunganController::total();
        PerhitunganController::ranking();
        
        $alternatifKriteria = AlternatifKriteria::get();
        $alternatif = Alternatif::get();
        $kriteria = Kriteria::get();
        $subKriteria = SubKriteria::get();

        return view('perhitungan.index', compact('alternatif', 'alternatifKriteria', 'kriteria', 'subKriteria'));
    }
    public function perhitungan() {
        PerhitunganController::matriksNormalisasi();
        PerhitunganController::normalisasiBobot();
        PerhitunganController::utilityMeasure();
        PerhitunganController::regrateMeasure();
        PerhitunganController::total();
        PerhitunganController::ranking();

        return redirect()->route('perhitungan.index');
    }
    public function matriksNormalisasi() {
        $alternatifKriteria = AlternatifKriteria::get();
        foreach($alternatifKriteria as $key => $value) {
            $kriteria = Kriteria::where('id', $value->kriteria_id)->first();
            // 'atribut', ['Cost', 'Benefit']);
            $normalisasi_matriks = 0;
            if($kriteria->atribut == 'Cost') {
                $normalisasi_matriks = ($value->nilai - $kriteria->min) / ($kriteria->max - $kriteria->min);
            }
            if($kriteria->atribut == 'Benefit') {
                $normalisasi_matriks = ($kriteria->max - $value->nilai) / ($kriteria->max - $kriteria->min);
            }
            AlternatifKriteria::where('id', $value->id)->update([
                'normalisasi_matriks' => $normalisasi_matriks
            ]);
        }
        return "sukses";
    }
    public function normalisasiBobot() {
        $alternatifKriteria = AlternatifKriteria::get();
        foreach($alternatifKriteria as $key => $value) {
            $kriteria = Kriteria::where('id', $value->kriteria_id)->first();
            $normalisasi_bobot = $kriteria->bobot * $value->normalisasi_matriks;
            AlternatifKriteria::where('id', $value->id)->update([
                'normalisasi_bobot' => $normalisasi_bobot
            ]);
        }
        return "sukses";
    }
    public function utilityMeasure() {
        $alternatifKriteria = AlternatifKriteria::get();
        $alternatif = Alternatif::get();
        foreach($alternatif as $key1 => $value1) {
            $si = 0;
            foreach($alternatifKriteria as $key2 => $value2) {
                if($value1->id == $value2->alternatif_id) {
                    $si += $value2->normalisasi_bobot;
                }
            }
            Alternatif::where('id', $value1->id)->update([
                'si' => $si
            ]);
        }
        return "sukses";
    }
    public function regrateMeasure() {
        $alternatifKriteria = AlternatifKriteria::get();
        $alternatif = Alternatif::get();
        foreach($alternatif as $key1 => $value1) {
            $ri = [];
            foreach($alternatifKriteria as $key2 => $value2) {
                if($value1->id == $value2->alternatif_id) {
                    $ri[] = $value2->normalisasi_bobot;
                }
            }
            $max_ri = max($ri);
            Alternatif::where('id', $value1->id)->update([
                'ri' => $max_ri
            ]);
        }
        return "sukses";
    }
    public function total() {
        // s+ = max si;
        // s- = min si;
        // r+ = max ri;
        // r- = min ri;
        $s_arr = [];
        $r_arr = [];
        $alternatif = Alternatif::get();
        foreach($alternatif as $key => $value) {
            $s_arr[] = $value->si;
            $r_arr[] = $value->ri;
        }
        $s_max = max($s_arr);
        $s_min = min($s_arr);
        $r_max = max($r_arr);
        $r_min = min($r_arr);
        foreach($alternatif as $key => $value) {
            $qi = 0.5 * (($value->si - $s_min) / ($s_max - $s_min)) + ((1 - 0.5) * (($value->ri - $r_min) / ($r_max - $r_min)));
            Alternatif::where('id', $value->id)->update([
                'qi' => $qi
            ]);
        }
        return "sukses";
        // $table->double('qi')->nullable();
        
    }
    public function ranking() {
        $alternatif = Alternatif::orderBy('qi', 'ASC')->get();
        foreach($alternatif as $key => $value) {
            $ranking = $key + 1;
            Alternatif::where('id', $value->id)->update([
                'ranking' => $ranking
            ]);
        }
        return "sukses";
    }
    
    // $perhitungan = 5; //selesai
    // $alternatif = Alternatif::get();
    // $alternatifKriteria = AlternatifKriteria::get();

    // foreach ($alternatif as $key => $value) {
    //     if($value->ranking == null || $value->ranking == 0) {
    //         $perhitungan = 4;
    //     }
    // }
    // if($perhitungan == 4) {
    //     foreach ($alternatif as $key => $value) {
    //         if($value->q1 == null || $value->q1 == 0) {
    //             $perhitungan = 3;
    //         }
    //     }
    // }
    // if($perhitungan == 3) {
    //     foreach ($alternatif as $key => $value) {
    //         if($value->r1 == null || $value->r1 == 0) {
    //             $perhitungan = 2;
    //         }
    //     }
    // }
    // if($perhitungan == 2) {
    //     foreach ($alternatif as $key => $value) {
    //         if($value->s1 == null || $value->s1 == 0) {
    //             $perhitungan = 1;
    //         }
    //     }
    // }
    // if($perhitungan == 1) {
    //     foreach ($alternatifKriteria as $key => $value) {
    //         if($value->normalisasi_bobot == null || $value->normalisasi_bobot == 0) {
    //             $perhitungan = 0;
    //         }
    //     }
    // }
}
