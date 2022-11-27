<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\AlternatifKriteria;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatif = Alternatif::get();
        return view('alternatif.index', compact('alternatif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alternatif.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alternatif = new Alternatif();
        $alternatif->kode = $request->kode;
        $alternatif->nama = $request->nama;
        $alternatif->deskripsi = '';
        $alternatif->save();

        $kriteria = Kriteria::get();
        foreach($kriteria as $v_kriteria) {
            AlternatifKriteria::insert([
                'alternatif_id' => $alternatif->id,
                'kriteria_id' => $v_kriteria->id,
                'nilai' => 1,
            ]);
        }

        return redirect('/alternatif');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alternatif = Alternatif::find($id);
        return view('alternatif.edit', compact('alternatif'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alternatif = Alternatif::where('id', $id)->first();
        $alternatif->kode = $request->kode;
        $alternatif->nama = $request->nama;
        $alternatif->save();
        return redirect('/alternatif');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_alternatif)
    {
        $alternatif = Alternatif::find($kode_alternatif);
        $alternatif->delete();
        return redirect('/alternatif');
    }
}
