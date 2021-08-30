<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <title>Arsip Surat</title>
  </head>
  <body>

  <div class="wrapper d-flex align-items-stretch">
    <nav id="sidebar" class="col-2">
      <div class="p-3 pt-5">
        <h4>Menu</h4>
        <ul class="list-unstyled components mb-5">
          <li>
            <a href="{{url('/home')}}">Arsip</a>
          </li>
          <li>
            <a href="{{url('/about')}}">About</a>
          </li>
        </ul>


      </div>
    </nav>

      <!-- Page Content  -->
    <div id="content" class="p-md-5 col-10">

      <h1>Arsip Surat>> Unggah</h1>
      <h5>Unggah Suray yang telah terbit pada form ini untuk diarsipkan</h5>
      <h5>Catatan:</h5>
      <h5>-Gunakan file berformat PDF</h5>

      @if ($errors->any())
        <div class="alert alert-danger">
          @foreach ($errors->all() as $error)
            <strong>Failed!</strong> {{ $error }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          @endforeach
        </div>
      @endif


      <form method="POST" action="{{url('/newData')}}">
        @csrf
        <div class="row mb-3">
          <label  class="col-sm-2 col-form-label">Nomor Surat</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="nomor" required>
          </div>
        </div>
        <div class="row mb-3">
          <label class="col-sm-2 col-form-label">Kategori</label>
          <div class="col-sm-10">
            <select class="form-select" name="kategori">
              <option selected>Undangan</option>
              <option>Pengumuman</option>
              <option>Nota Dinas</option>
              <option>Pemberitahuan</option>
            </select>
          </div>
        </div>
        <div class="row mb-3">
          <label  class="col-sm-2 col-form-label">Judul</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="judul" required>
          </div>
        </div>
         <div class="row mb-3">
          <label  class="col-sm-2 col-form-label">File Surat(PDF)</label>
          <div class="col-sm-7">
          <input type="file" class="form-control" name="file" required>
          </div>
          
        </div>
        <div class="row mb-3">
          <div class="col-sm-10">
            <a href="{{url('/home')}}"><button type="button" class="btn btn-secondary"><< Kembali</button></a>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </div>
      </form>
    
    </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>
