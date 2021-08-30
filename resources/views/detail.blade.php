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

      <h1>Arsip Surat >> Lihat</h1>
      <h5>Nomor: {{$surat->nomor}}</h5>
      <h5>Kategori: {{$surat->kategori}}</h5>
      <h5>Judul: {{$surat->judul}}</h5>
      <h5>Waktu Unggah: {{$surat->created_at}}</h5>

      <object data="data:application/pdf;base64,{{base64_encode($surat->file)}}" type="application/pdf" style="height:600px;width:100%"></object>
      <div class="row mb-3">
        <div class="col-sm">
          <a href="{{url('/home')}}"><button type="button" class="btn btn-secondary"><< Kembali</button></a>
          <a href="{{$surat->file}}" download><button type="button" class="btn btn-primary">Unduh</button></a>
          <button type="button" class="btn btn-warning">Edit/Ganti File</button>
          
        </div>
      </div>
    
    </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->

  </body>
</html>
