@extends('layouts.master')

@section('content')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
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
                                    <a class="btn btn-danger" href="/kriteria" >Kembali</a>
                                </form>
                                {{-- <h5 class="card-title text-primary">Congratulations John! 🎉</h5>
                                <p class="mb-4">
                                You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                                your profile.
                                </p>

                                <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a> --}}
                            </div>
                        </div>
                        <div class="col-sm-5 text-center text-sm-left">
                            <div class="card-body pb-0 px-0 px-md-4">
                                @if($laptop == null)
                                    Kosong
                                @else
                                    <table>
                                        <tr>
                                            <td>No</td>
                                            <td>Nama</td>
                                            <td>Ranking</td>
                                        </tr>
                                        @foreach($laptop as $key => $value) 
                                            <tr>
                                                <td>{{ $key+1 }}</td>
                                                <td>{{ $value->nama }}</td>
                                                <td>{{ $value->ranking }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection