<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Alternatif;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use App\Models\AlternatifKriteria;
use App\Http\Controllers\Controller;

class KriteriaController extends Controller
{
    public function index()
    {
        $kriteria = Kriteria::all();
        return view('kriteria.index', compact('kriteria'));
    }

    public function create()
    {
        return view('kriteria.create');
    }

    public function store(Request $request)
    {
        $kriteria = new Kriteria;
        $kriteria->kode = $request->kode;
        $kriteria->nama = $request->nama;
        $kriteria->atribut = $request->atribut;
        $kriteria->bobot = $request->bobot;
        $kriteria->save();

        $alternatif = Alternatif::get();
        foreach ($alternatif as $v_alternatif) {
            AlternatifKriteria::insert([
                'alternatif_id' => $v_alternatif->id,
                'kriteria_id' => $kriteria->id,
                'nilai' => 1,
            ]);
        }

        return redirect('/kriteria')->with('success', 'Data berhasil ditambah!');
    }

    public function edit($id)
    {
        $kriteria = Kriteria::find($id);
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update($id, Request $request, Kriteria $kriteria)
    {
        $kriteria = Kriteria::find($id);
        $kriteria->kode = $request->kode;
        $kriteria->nama = $request->nama;
        $kriteria->atribut = $request->atribut;
        $kriteria->bobot = $request->bobot;
        $kriteria->save();

        return redirect('/kriteria')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id)
    {
        $kriteria = Kriteria::where('id', $id)->first();
        SubKriteria::where('kriteria_id', $id)->delete();
        AlternatifKriteria::where('kriteria_id', $id)->delete();
        $kriteria->delete();
        return response()->json(['status' => 'Data berhasil dihapus!']);
    }
}
