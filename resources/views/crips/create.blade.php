<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Nilai Kriteria</title>
</head>
<body>
    <div class="container">
        <h1>Tambah Nilai Kriteria</h1>

            <form action="{{ route('crips.store') }}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Kode Nilai Kriteria</label>
                    <div class="col-sm-10">
                        <input type="text" name="kode_crips" class="form-control" id="exampleInputEmail1">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Kriteria</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="kode_kriteria">
                            <option value="">Pilih Kriteria</option>
                            @foreach ($criteria as $item)
                                
                            <option value="{{ $item->kode_kriteria }}">{{ $item->kode_kriteria }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Nama Nilai Kriteria</label>
                    <div class="col-sm-10">
                    <input type="text" name="nama_crips" class="form-control" id="exampleInputEmail1">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Bobot</label>
                    <div class="col-sm-10">
                    <input type="text" name="bobot" class="form-control" id="exampleInputEmail1">
                    </div>
                </div>
                
                
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    <a class="btn btn-danger" href="/crips" >Kembali</a>
                

            </form>
    </div>
</body>
</html>