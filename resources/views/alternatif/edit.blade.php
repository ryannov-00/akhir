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
        <h1>Edit Alternatif</h1>
            <form action="/alternatif/{{ $alternatif->kode_alternatif }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Kode Alternatif</label>
                    <div class="col-sm-10">
                        <input type="text" name="kode_alternatif" class="form-control" id="exampleInputEmail1" value="{{ $alternatif->kode_alternatif }}" disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nama Alternatif</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_alternatif" class="form-control" id="exampleInputEmail1" value="{{ $alternatif->nama_alternatif }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-10">
                        <input type="text" name="deskripsi" class="form-control" id="exampleInputEmail1" value="{{ $alternatif->deskripsi}}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Ranking</label>
                    <div class="col-sm-10">
                        <input type="text" name="ranking" class="form-control" id="exampleInputEmail1" value="{{ $alternatif->ranking }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Total</label>
                    <div class="col-sm-10">
                        <input type="text" name="total" class="form-control" id="exampleInputEmail1" value="{{ $alternatif->total }}">
                    </div>
                </div>
                
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                <a class="btn btn-danger" href="/alternatif" >Kembali</a>

            </form>
    </div>
</body>
</html>