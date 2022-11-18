<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use Illuminate\Http\Request;

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

        return redirect('/kriteria');
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

        return redirect('/kriteria');
    }

    public function destroy($kode)
    {
        $kriteria = Kriteria::find($kode);
        $kriteria->delete();
        return redirect('/kriteria');
    }
}
