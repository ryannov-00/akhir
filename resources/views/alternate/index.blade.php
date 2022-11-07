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
                        <h2>Data Nilai Alternatif</h2>
                    </div>
                    <div class="card-body">
                    {{-- <a href="/alternatif/create" class="btn btn-primary">Tambah Alternatif</a> --}}
                        <table class="table table-hover table-bordered border-light">
                            <tr>
                                <td>NO</td>
                                <td>NAMA ALTERNATIF</td>
                                @foreach ($criteria as $cr)
                                <td>{{ $cr->nama_kriteria }}</td>
                                @endforeach
                                <td>AKSI</td>
                                
                            </tr>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($alternatives as $al)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $al->nama_alternatif }}</td>
                                {{-- <td>{{ $al->kode_alternatif }}</td> --}}
                                <td></td>
                                <td></td>
                                <td></td>
                                
                                <td>
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-warning" href="/alternatif/{{ $al->id }}/edit">Edit</a>
                                        <form  action="/alternatif/{{ $al->id }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input class="btn btn-danger" type="submit" value="Delete">
                                        </form>
                                    </div>
                                </td>
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