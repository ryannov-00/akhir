
@extends('layouts.master')
@section('content')
@section ('title') {{ 'Tambah Sub-Kriteria' }} @endsection
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tambah </span> Sub Kriteria</h4>

        <form action="{{ route('sub-kriteria.store') }}" method="POST">
            @csrf
            <div class="mb-3 row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nama Kriteria</label>
                <div class="col-sm-10">
                    <select class="form-select" name="kriteria_id">
                        <option value="">Pilih Atribut</option>
                        @foreach ($kriteria as $key => $value)
                        <option value="{{ $value->id }}">{{ $value->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nama Sub Kriteria</label>
                <div class="col-sm-10">
                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Skor</label>
                <div class="col-sm-10">
                    <input type="text" name="score" class="form-control" id="exampleInputEmail1">
                </div>
            </div>
            
            
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                <a class="btn btn-danger" href="/sub-kriteria" >Kembali</a>
        </form>
</div>
@endsection