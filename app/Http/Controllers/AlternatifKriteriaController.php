<?php

namespace App\Http\Controllers;

use App\Models\AlternatifKriteria;
use App\Http\Requests\StoreAlternatifKriteriaRequest;
use App\Http\Requests\UpdateAlternatifKriteriaRequest;
use App\Models\Alternatif;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class AlternatifKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kriteria = Kriteria::get();
        $alternatif = Alternatif::get();
        $alternatifKriteria = AlternatifKriteria::get();
        $subKriteria = SubKriteria::get();
        return view('alternatif_kriteria.index', compact('kriteria', 'alternatif', 'alternatifKriteria', 'subKriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = Kriteria::get();
        $alternatif = Alternatif::get();
        $alternatifKriteria = AlternatifKriteria::get();
        $subKriteria = SubKriteria::get();
        return view('alternatif_kriteria.create', compact('kriteria', 'alternatif', 'alternatifKriteria', 'subKriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAlternatifKriteriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alternatif = Alternatif::get();
        $kriteria = Kriteria::get();
        foreach($kriteria as $v_k) {
            $nilai = [];
            foreach($alternatif as $v_a) {
                $input = 'input'.$v_a->id.'|'.$v_k->id;
                $alternatifKriteria = AlternatifKriteria::where('kriteria_id', $v_k->id)->where('alternatif_id', $v_a->id)->first();
                if(!$alternatifKriteria) {
                    $alternatifKriteria = new AlternatifKriteria();
                }
                $alternatifKriteria->nilai = $request->$input;
                $alternatifKriteria->save();
                $nilai[] = $request->$input;
            }
            $min = min($nilai);
            $max = max($nilai);
            Kriteria::where('id', $v_k->id)->update([
                'max' => $max,
                'min' => $min
            ]);
        }
        return redirect()->route('alternatif-kriteria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AlternatifKriteria  $alternatifKriteria
     * @return \Illuminate\Http\Response
     */
    public function show(AlternatifKriteria $alternatifKriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AlternatifKriteria  $alternatifKriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(AlternatifKriteria $alternatifKriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAlternatifKriteriaRequest  $request
     * @param  \App\Models\AlternatifKriteria  $alternatifKriteria
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAlternatifKriteriaRequest $request, AlternatifKriteria $alternatifKriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AlternatifKriteria  $alternatifKriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(AlternatifKriteria $alternatifKriteria)
    {
        //
    }
}
