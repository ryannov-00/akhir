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
        <h1>Edit Kriteria</h1>
            <form action="/kriteria/{{ $kriteria->kode_kriteria }}" method="POST">
                @method('put')
                @csrf
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Kode Kriteria</label>
                    <div class="col-sm-10">
                        <input type="text" name="kode_kriteria" class="form-control" id="exampleInputEmail1" value="{{ $kriteria->kode_kriteria }}" disabled>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nama Kriteria</label>
                    <div class="col-sm-10">
                        <input type="text" name="nama_kriteria" class="form-control" id="exampleInputEmail1" value="{{ $kriteria->nama_kriteria }}">
                    </div>
                </div>
                
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Atribut</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="atribut">
                            <option value="">Pilih Atribut</option>
                            <option value="Cost" @if ($kriteria->atribut == "Cost") selected @endif>Cost</option>
                            <option value="Benefit"  @if ($kriteria->atribut == "Benefit") selected @endif>Benefit</option>
                        </select><br>
                    </div>
                </div>

                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                <a class="btn btn-danger" href="/kriteria" >Kembali</a>

            </form>
    </div>
</body>
</html>