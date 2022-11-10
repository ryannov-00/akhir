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
                        <h2>Kriteria</h2>
                    </div>
                    <div class="card-body">
                    <a href="/kriteria/create" class="btn btn-primary">Tambah Kriteria</a>
                        <table class="table table-hover table-bordered border-light">
                            <tr>
                                <td>NO</td>
                                <td>KODE KRITERIA</td>
                                <td>NAMA KRITERIA</td>
                                <td>ATRIBUT</td>
                                <td>AKSI</td>
                            </tr>
                            @php
                            $no=1;
                            @endphp
                            @foreach ($kriteria as $k)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $k->kode }}</td>
                                <td>{{ $k->nama }}</td>
                                <td>{{ $k->atribut }}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-warning" href="/kriteria/{{ $k->kode_kriteria }}/edit">Edit</a>
                                        <form  action="/kriteria/{{ $k->id }}" method="POST">
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