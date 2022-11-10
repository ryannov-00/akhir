<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Nilai Alternatif</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h2>Perhitungan</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered border-light">
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
                                                <td>{{ $ka->nilai }}</td>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                        <table class="table table-hover table-bordered border-light">
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
                                                <td>{{ $ka->normalisasi_matriks }}</td>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                        <table class="table table-hover table-bordered border-light">
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
                                                <td>{{ $ka->normalisasi_bobot }}</td>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tr>
                            @endforeach
                        </table>
                        <table class="table table-hover table-bordered border-light">
                            <tr>
                                <td>NO</td>
                                <td>KODE ALTERNATIF</td>
                                <td>NAMA ALTERNATIF</td>
                                <td>DESKRIPSI</td>
                                <td>RANKING</td>
                                <td>TOTAL</td>
                            </tr>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($alternatif as $a)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $a->kode }}</td>
                                <td>{{ $a->nama }}</td>
                                <td>{{ $a->deskripsi }}</td>
                                <td>{{ $a->ranking }}</td>
                                <td>{{ $a->qi }}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>