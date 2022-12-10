
@extends('layouts.master')
@section('content')
@section ('title') {{ 'Edit Alternatif' }} @endsection
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tambah </span> Alternatif</h4>

    <form action="/alternatif/{{ $alternatif->id }}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3 row">
            <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Kode Alternatif</label>
            <div class="col-sm-10">
                <input type="text" name="kode" class="form-control" id="exampleInputEmail1" value="{{ $alternatif->kode }}">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nama Alternatif</label>
            <div class="col-sm-10">
                <input type="text" name="nama" class="form-control" id="exampleInputEmail1" value="{{ $alternatif->nama }}">
            </div>
        </div>
        
        <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
        <a class="btn btn-danger" href="/alternatif" >Kembali</a>
    </form>
</div>
@endsection