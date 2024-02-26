<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js"integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous">
    </script>
</head>
<body>
    @if (session('success'))
        <div class="alert alert-success text-center d-flex align-items-center justify-content-center gap-2">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endif
    @if (session('deleted'))
        <div class="alert alert-danger text-center d-flex align-items-center justify-content-center gap-2">
            {{ session('deleted') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
    @endif
    <table class="table text-center">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Umur</th>
            <th scope="col">Detail</th>
          </tr>
        </thead>
        @foreach ($karyawans as $key=>$karyawan)
            <tbody>
              <tr>
                <th scope="row">{{ count($karyawans) - $key }}</th>
                <td>{{$karyawan->nama}}</td>
                <td>{{$karyawan->umur}}</td>
                <td><a href="/detail-karyawan/{{$karyawan->id}}" class="btn btn-primary">Detail</a>
                    <a href="/edit-karyawan/{{$karyawan->id}}" class="btn btn-primary">Edit</a>
                    <form action="/delete/{{$karyawan -> id}}" method="POST" id="deleteForm{{ $karyawan->id }}">
                        @csrf
                        @method('delete')
                        <button type="button" onclick="confirmDelete({{ $karyawan->id }})" class="btn btn-danger btn-sm">Delete</button>
                    </form>
              </tr>
            </tbody>
        @endforeach
    </table>

    <div class="text-center">
        <h2 class="mt-3">Tambah Karyawan</h2>
        <a href="/add-karyawan" class = "btn btn-success">Tambah</a>
    </div>

</body>
<script>
    function confirmDelete(karyawanId) {
        var confirmation = confirm("Do you really wish to delete this book?");
        if (confirmation) {
            document.getElementById('deleteForm' + karyawanId).submit();
        } else {
            return false;
        }
    }
</script>
</html>