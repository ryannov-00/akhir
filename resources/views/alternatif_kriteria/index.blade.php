<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Kriteria</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h2>Alternatif Kriteria</h2>
                    </div>
                    <div class="card-body">
                    <a href="/alternatif-kriteria/create" class="btn btn-primary">Tambah Alternatif Kriteria</a>
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
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>