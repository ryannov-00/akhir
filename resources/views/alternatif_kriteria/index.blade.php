
@extends('layouts.master')

@section('content')
    

        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tabel </span> Alternatif Kriteria</h4>

            <!-- Hoverable Table rows -->
            <div class="card">
                <h5 class="card-header"> 
                    <a href="/alternatif-kriteria/create" class="btn btn-primary">Edit Alternatif Kriteria</a> 
                </h5>
                <div class="table-responsive text-nowrap">
                    <div class="card-body">
                        <table class="table table-hover table-borderless">
                            <thead>
                            <tr>
                                <th>Alternatif</th>
                                @foreach($kriteria as $k)
                                    <th>{{ $k->nama }}</th>
                                @endforeach
                            </tr>
                            </thead>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($alternatif as $key_a => $a)
                                
                            <tbody class="table-border-bottom-0">
                                <tr>
                                    <td>{{ $a->nama }}</td>
                                    @foreach($kriteria as $key_k => $k)
                                        @foreach($alternatifKriteria as $ka)
                                            @if($ka->alternatif_id == $a->id && $ka->kriteria_id == $k->id)
                                                @foreach($subKriteria as $sk)
                                                    @if($ka->nilai == $sk->score && $sk->kriteria_id == $k->id)
                                                        <td>{{ $sk->nama }}</td>
                                                    @endif
                                                @endforeach
                                                {{-- <td>{{ $ka->nilai }}</td> --}}
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
            <!--/ Hoverable Table rows -->

        </div>
        <!-- / Content -->

@endsection