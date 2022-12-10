<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubKriteriaRequest;
use App\Http\Requests\UpdateSubKriteriaRequest;

class SubKriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subkriteria = SubKriteria::with('kriteria')->get();
        // dd($subkriteria);
        return view('sub_kriteria.index', compact('subkriteria'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kriteria = Kriteria::get();
        return view('sub_kriteria.create', compact('kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubKriteriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subkriteria = new SubKriteria;
        $subkriteria->kriteria_id = $request->kriteria_id;
        $subkriteria->nama = $request->nama;
        $subkriteria->score = $request->score;
        $subkriteria->save();

        return redirect('sub-kriteria')->with('success', 'Data berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubKriteria  $subKriteria
     * @return \Illuminate\Http\Response
     */
    public function show(SubKriteria $subKriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubKriteria  $subKriteria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kriteria = Kriteria::get();
        $subkriteria = SubKriteria::find($id);
        return view('sub_kriteria.edit', compact('subkriteria', 'kriteria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubKriteriaRequest  $request
     * @param  \App\Models\SubKriteria  $subKriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, SubKriteria $subkriteria)
    {
        $subkriteria = SubKriteria::find($id);
        $subkriteria->kriteria_id = $request->kriteria_id;
        $subkriteria->nama = $request->nama;
        $subkriteria->score = $request->score;
        $subkriteria->update();

        return redirect('sub-kriteria')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubKriteria  $subKriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subkriteria = SubKriteria::find($id);
        $subkriteria->delete();
        return response()->json(['status' => 'Data berhasil dihapus!']);
    }
}
