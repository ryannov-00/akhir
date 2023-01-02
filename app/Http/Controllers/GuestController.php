<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\AlternatifKriteria;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index($laptop = [], $sesuai = [], $input = null, $first = true)
    {
        $kriteria = Kriteria::with('subKriteria')->get();
        // dd([
        //     $input,
        //     $laptop[0]
        // ]);
        // $laptop = [];
        // $laptop_id = [];
        // $sesuai = [];
        $not_found = [];
        if ($sesuai == null || count($sesuai) == 0) {
            foreach ($laptop as $k_laptop => $value) {
                $not_found[] = $value;
                foreach ($value->alternatifKriteria as $k_alternatif_kriteria => $v_alternatif_kriteria) {
                    $key_alternatif_kriteria = $k_alternatif_kriteria + 1;
                    if ($input[$key_alternatif_kriteria] != $v_alternatif_kriteria->nilai) {
                        // $kriteria = Kriteria::where('id', $v_alternatif_kriteria->kriteria_id)->first();
                        $not_found[] = $v_alternatif_kriteria->kriteria_id;
                    }
                }
            }
        }
        $pesan_id = array_unique($not_found);
        $kriteria_id = Kriteria::whereIn('id', $pesan_id)->get();
        // dd($kriteria_id);
        $pesan = '';
        foreach ($kriteria_id as $key => $value) {
            $pesan .= '<li>' . $value->nama . " Tidak Ada</li>";
        }
        // $pesan = '<li>ABCDEF</li><li>DEFGHI</li>';

        return view('guest', compact('kriteria', 'laptop', 'input', 'sesuai', 'pesan', 'first'));
    }
    public function filter(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        unset($input['submit']);
        // dd($input);
        // 1 => "3"
        // 2 => "3"
        // 3 => "2"
        // 4 => "3"
        // 5 => "3"
        // 6 => "3"
        // 7 => "1"
        // $al = Alternatif::where('nama', 'MSI GF63 Thin 11UD')->first();
        // $kriteria = Kriteria::where('id', 7)->first();
        // $sub_kriteria = SubKriteria::where('kriteria_id', 7)->get();
        // dd([
        //     $kriteria,
        //     $sub_kriteria
        // ]);
        // $al = Alternatif::where('nama', 'MSI GF63 Thin 11UD')->first();
        // $test = AlternatifKriteria::where('alternatif_id', $al->id)->get();
        // dd($test);
        // dd(AlternatifKriteria::where('alternatif_id', 99)->get());

        $alternatif_id = [];
        foreach ($input as $k_input => $v_input) {
            $alternatif_kriteria = AlternatifKriteria::where('kriteria_id', $k_input)->where('nilai', $v_input)->get();
            if ($alternatif_kriteria) {
                foreach ($alternatif_kriteria as $v_alternatif_kriteria) {
                    $alternatif_id[] = $v_alternatif_kriteria->alternatif_id;
                }
            }
        }
        $sesuai_array = array_count_values($alternatif_id);
        $sesuai_id = [];
        $kriteria_count = Kriteria::count();
        foreach ($sesuai_array as $k_sesuai_array => $v_sesuai_array) {
            if ($v_sesuai_array >= $kriteria_count) {
                $sesuai_id[] = $k_sesuai_array;
            }
        }
        $id = array_unique($alternatif_id);
        $laptop = Alternatif::whereIn('id', $id)->orderBy('ranking', 'ASC')->with('alternatifKriteria.kriteria')->get();
        $sesuai = Alternatif::whereIn('id', $sesuai_id)->orderBy('ranking', 'ASC')->with('alternatifKriteria.kriteria')->get();

        // $sesuai = AlternatifKriteria::select('alternatif_id')
        //     ->where('kriteria_id', 1)->andWhere('nilai', $input[1])
        //     ->where('kriteria_id', 2)->andWhere('nilai', $input[2])
        //     ->where('kriteria_id', 3)->andWhere('nilai', $input[3])
        //     ->where('kriteria_id', 4)->andWhere('nilai', $input[4])
        //     ->where('kriteria_id', 5)->andWhere('nilai', $input[5])
        //     ->where('kriteria_id', 6)->andWhere('nilai', $input[6])
        //     ->where('kriteria_id', 7)->andWhere('nilai', $input[7])
        //     ->get();
        $first = false;
        return GuestController::index($laptop, $sesuai, $input, $first);
    }
}
