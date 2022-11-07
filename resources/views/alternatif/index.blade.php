<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Alternatif</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h2>Alternatif</h2>
                    </div>
                    <div class="card-body">
                    <a href="/alternatif/create" class="btn btn-primary">Tambah Alternatif</a>
                        <table class="table table-hover table-bordered border-light">
                            <tr>
                                <td>NO</td>
                                <td>KODE ALTERNATIF</td>
                                <td>NAMA ALTERNATIF</td>
                                <td>DESKRIPSI</td>
                                <td>RANKING</td>
                                <td>TOTAL</td>
                                <td>AKSI</td>
                            </tr>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($alternatif as $a)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $a->kode_alternatif }}</td>
                                <td>{{ $a->nama_alternatif }}</td>
                                <td>{{ $a->deskripsi }}</td>
                                <td>{{ $a->ranking }}</td>
                                <td>{{ $a->total }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-warning" href="/alternatif/{{ $a->kode_alternatif }}/edit">Edit</a>
                                        <form  action="/alternatif/{{ $a->kode_alternatif }}" method="POST">
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