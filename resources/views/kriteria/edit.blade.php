
@extends('layouts.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit </span> Kriteria</h4>

    <form action="/kriteria/{{ $kriteria->id }}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3 row">
            <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Kode Kriteria</label>
            <div class="col-sm-10">
                <input type="text" name="kode" class="form-control" id="exampleInputEmail1" value="{{ $kriteria->kode }}" disabled>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nama Kriteria</label>
            <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" value="{{ $kriteria->nama }}">
            </div>
        </div>
        
        <div class="mb-3 row">
            <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Atribut</label>
            <div class="col-sm-10">
                <select class="form-select" name="atribut">
                    <option value="">Pilih Atribut</option>
                    <option value="Cost" @if ($kriteria->atribut == "Cost") selected @endif>Cost</option>
                    <option value="Benefit"  @if ($kriteria->atribut == "Benefit") selected @endif>Benefit</option>
                </select><br>
            </div>
        </div>

        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
        <a class="btn btn-danger" href="/kriteria" >Kembali</a>

    </form>
@endsection