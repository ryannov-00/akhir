@extends('layouts.master')

@section('content')
    
@section ('title') {{ 'Hasil Perhitungan' }} @endsection
        <!-- Content -->
        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Hasil </span> Perhitungan</h4>

            <!-- Hoverable Table rows -->

            <div class="card">
                <h5 class="card-header"> 
                    Matriks Keputusan (F)
                </h5>
                <div class="table-responsive text-nowrap">
                    <div class="card-body">
                        <table class="table table-hover table-borderless">
                            <thead>
                            <tr>
                                <tr>
                                    <th>Alternatif</th>
                                    @foreach($kriteria as $k)
                                        <th>{{ $k->nama }}</th>
                                    @endforeach
                                </tr>
                            </tr>
                            </thead>
                            @php
                            $no=1;
                            @endphp
                            @foreach($alternatif as $key_a => $a)
                    
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>{{ $a->nama }}</td>
                                    @foreach($kriteria as $key_k => $k)
                                        @foreach($alternatifKriteria as $ka)
                                            @if($ka->alternatif_id == $a->id && $ka->kriteria_id == $k->id)
                                                <td>{{ $ka->nilai }}</td>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            
            <hr class="my-2" />

            <div class="card">
                <h5 class="card-header"> 
                    Matriks Normalisasi (N)
                </h5>
                <div class="table-responsive text-nowrap">
                    <div class="card-body">
                        <table class="table table-hover table-borderless">
                            <thead>
                            <tr>
                                <tr>
                                    <th>Alternatif</th>
                                    @foreach($kriteria as $k)
                                        <th>{{ $k->nama }}</th>
                                    @endforeach
                                </tr>
                            </tr>
                            </thead>
                            @php
                            $no=1;
                            @endphp
                            @foreach($alternatif as $key_a => $a)
                    
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>{{ $a->nama }}</td>
                                    @foreach($kriteria as $key_k => $k)
                                        @foreach($alternatifKriteria as $ka)
                                            @if($ka->alternatif_id == $a->id && $ka->kriteria_id == $k->id)
                                                <td>{{ $ka->normalisasi_matriks }}</td>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
            
            <hr class="my-2" />

            <div class="card">
                <h5 class="card-header"> 
                    Normalisasi Bobot (F*)
                </h5>
                <div class="table-responsive text-nowrap">
                    <div class="card-body">
                        <table class="table table-hover table-borderless">
                            <thead>
                            <tr>
                                <tr>
                                    <th>Alternatif</th>
                                    @foreach($kriteria as $k)
                                        <th>{{ $k->nama }}</th>
                                    @endforeach
                                </tr>
                            </tr>
                            </thead>
                            @php
                            $no=1;
                            @endphp
                            @foreach($alternatif as $key_a => $a)
                    
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>{{ $a->nama }}</td>
                                    @foreach($kriteria as $key_k => $k)
                                        @foreach($alternatifKriteria as $ka)
                                            @if($ka->alternatif_id == $a->id && $ka->kriteria_id == $k->id)
                                                <td>{{ $ka->normalisasi_bobot }}</td>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <hr class="my-2" />

            <div class="card">
                <h5 class="card-header"> 
                    Hasil
                </h5>
                <div class="table-responsive text-nowrap">
                    <div class="card-body">
                        <table class="table table-hover table-borderless">
                            <thead>
                            <tr>
                                <tr>
                                    <th>Nama Alternatif</th>
                                    <th>Ranking</th>
                                    <th>Total</th>
                                </tr>
                            </tr>
                            </thead>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($alternatif as $a)
                    
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    {{-- <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $no++ }}</strong></td> --}}
                                    <td>{{ $a->nama }}</td>
                                    <td>{{ $a->ranking }}</td>
                                    <td>{{ $a->qi }}</td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <!--/ Hoverable Table rows -->
        </div>
        <!-- / Content -->
@endsection