
@extends('layouts.master')

@section('content')
@section ('title') {{ 'Edit Nilai' }} @endsection

        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Edit </span> Alternatif Kriteria</h4>

            <!-- Hoverable Table rows -->
            <div class="card">

                <div class="table-responsive text-nowrap">
                    <div class="card-body">
                        <form action="{{ route('alternatif-kriteria.store') }}" method="POST">
                            @csrf
                                <table class="table table-hover table-borderless">
                                    <tr>
                                        <td>Alternatif</td>
                                        @foreach($kriteria as $k)
                                            <td>{{ $k->nama }}</td>
                                        @endforeach
                                    </tr>
                                    @foreach($alternatif as $key_a => $a)
                                        <tr>
                                            <td>{{ $a->nama }}</td>
                                            @foreach($kriteria as $key_k => $k)
                                                @foreach($alternatifKriteria as $ka)
                                                    @if($ka->alternatif_id == $a->id && $ka->kriteria_id == $k->id)
                                                        <td>
                                                            <select class="form-select" aria-label="Default select example" name="input{{ $a->id }}|{{ $k->id }}">
                                                                @foreach($subKriteria as $sk)
                                                                    @if($sk->kriteria_id == $k->id)
                                                                        @if($ka->nilai == null)
                                                                            <option>Data belum diisi</option>
                                                                        @elseif($ka->nilai == $sk->score)
                                                                            <option value="{{ $sk->score }}" selected>{{ $sk->nama }}</option>
                                                                        @else
                                                                            <option value="{{ $sk->score }}">{{ $sk->nama }}</option>
                                                                        @endif
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                        </td>
                                                        {{-- <select name="">
                                                            @foreach($subKriteria as $sk)
                                                                @if($sk->kriteria_id == $k->id)
                                                                    <option value="{{ $sk->id }}">{{ $sk->nama }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select> --}}
                                                        {{-- <td>{{ $ka->nilai }}</td> --}}
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </table>
                                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                                <a class="btn btn-danger" href="/kriteria" >Kembali</a>
                            </form>
                    </div>
                </div>
            </div>
            <!--/ Hoverable Table rows -->

        </div>
        <!-- / Content -->

@endsection