@extends('layouts.master')

@section('content')
@section ('title') {{ 'Dashboard' }} @endsection
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Dashboard </span></h4>
        <div class="row">
            <div class="col-lg-12 mb-4 order-0">
                <div class="card">
                    <div class="d-flex align-items-end row">
                        <div class="col-sm-12">

                            <div class="card-body" style="font-size:16px; text-align:justify;">                    
                                <h4>VIKOR</h4>
                                Metode VIKOR merupakan metode analisis pengambilan keputusan dengan 
                                Multi Atribut Decision Making (MADM) yang dikembangkan oleh Serafim Opricovic 
                                untuk memecahkan permasalahan keputusan dengan kriteria yang saling bertentangan 
                                dari unit yang berbeda, dengan asumsi bahwa kompromi dapat diterima sebagai resolusi 
                                dari konflik yang ada. Pengambil keputusan menginginkan solusi yang mendekati ideal dan 
                                setiap alternatif dievaluasi sesuai dengan kriteria yang telah ditetapkan. VIKOR 
                                melakukan perangkingan terhadap alternatif dan menentukan solusi yang mendekat solusi 
                                kompromi ideal.
                        </div>                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->
@endsection