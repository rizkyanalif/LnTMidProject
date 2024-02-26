<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <h2 class="text-center mt-5">Tambah Karyawan</h2>


    <form action="/update-karyawan/{{$karyawan->id}}" method="POST">
        @csrf
        @method('patch')
        <div class="d-flex flex-column align-items-center pt-3 gap-3">
            <div class="form-group col-4">
                <label for="">Nama</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Masukkan nama karyawan" name="nama" value="{{$karyawan->nama}}">
                @error('nama')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group col-4">
                <label for="">Umur</label>
                <input type="text" class="form-control @error('umur') is-invalid @enderror" placeholder="Masukkan umur karyawan" name="umur" value="{{$karyawan->umur}}">
                @error('umur')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group col-4">
                <label for="">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" placeholder="Masukkan alamat karyawan" name="alamat" value="{{$karyawan->alamat}}">
                @error('alamat')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <div class="form-group col-4">
                <label for="">Nomor Telepon</label>
                <input type="text" class="form-control @error('noHp') is-invalid @enderror" placeholder="Masukkan nomor telepon karyawan" name="noHp" value="{{$karyawan->noHp}}">
                @error('noHp')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-sm">Submit</button>

        </div>
    </form>
</body>
</html>