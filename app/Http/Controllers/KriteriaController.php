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
        Kriteria::create($request->except('_token', 'submit'));
        // dd($request->except('_token', 'submit'));
        return redirect('/kriteria');
    }

    public function edit($kode_kriteria)
    {
        $kriteria = Kriteria::find($kode_kriteria);
        return view('kriteria.edit', compact('kriteria'));
    }

    public function update($kode_kriteria, Request $request)
    {
        $kriteria = Kriteria::find($kode_kriteria);
        $kriteria->update($request->except('_token', 'submit'));
        return redirect('/kriteria');
    }

    public function destroy($kode_kriteria)
    {
        $kriteria = Kriteria::find($kode_kriteria);
        $kriteria->delete();
        return redirect('/kriteria');
    }
}
