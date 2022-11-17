
@extends('layouts.master')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tambah </span> Kriteria</h4>

        <form action="{{ route('kriteria.store') }}" method="POST">
            @csrf
            <div class="mb-3 row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Kode Kriteria</label>
                <div class="col-sm-10">
                    <input type="text" name="kode_kriteria" class="form-control" id="exampleInputEmail1">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nama Kriteria</label>
                <div class="col-sm-10">
                    <input type="text" name="nama_kriteria" class="form-control" id="exampleInputEmail1">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Atribut</label>
                <div class="col-sm-10">
                    <select class="form-select" name="atribut">
                        <option value="">Pilih Atribut</option>
                        <option value="Cost">COST</option>
                        <option value="Benefit">BENEFIT</option>
                    </select><br>
                </div>
            </div>
            
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                <a class="btn btn-danger" href="/kriteria" >Kembali</a>
        </form>
</div>
@endsection