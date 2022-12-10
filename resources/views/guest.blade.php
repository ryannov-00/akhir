@extends('layouts.guest')

@section('content')
@section ('title') {{ 'SPK VIKOR' }} @endsection
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card" >
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">
                            <div class="card-body">                    
                                <form action="{{ route('filter') }}" method="POST">
                                    @csrf
                                    @foreach($kriteria as $value)
                                        <div class="mb-3 row">
                                            <label for="exampleInputEmail1" class="col-sm-2 col-form-label">{{ $value->nama }}</label>
                                            <div class="col-sm-10">
                                                <select class="form-select" name="{{ $value->kode }}">
                                                    @foreach($value->subKriteria as $v_subKriteria)
                                                        <option value="{{ $v_subKriteria->id }}">{{ $v_subKriteria->nama }}</option>
                                                    @endforeach
                                                </select><br>
                                            </div>
                                        </div>
                                    @endforeach
                                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                    {{-- <a class="btn btn-danger" href="/kriteria" >Kembali</a> --}}
                                </form>
                            </div>
                        </div>
                        
                        <div class="card-body pb-0 px-0 px-md-4">
                                @if($laptop == null)
                                    Kosong
                                @else
                                
                                <table class="table table-hover table-borderless">
                                        <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Ranking</th>
                                        </tr>
                                        </thead>
                                        <tbody class="table-border-bottom-0">
                                        @foreach($laptop as $key => $value) 
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $value->nama }}</td>
                                                <td>{{ $value->ranking }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>

                                    </table>
                                @endif
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection