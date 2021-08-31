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

      <h1>Arsip Surat</h1>
      <h5>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.</h5>
      <h5>Klik "Lihat" pada kolom aksi untuk menampilkan surat</h5>


      @if (session('status'))
        <div class="alert alert-success alert-dismissible">
          <strong>Success!</strong> {{ session('status') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      <!-- search filter sort bar -->
      <div class="row">
        <div class="col-2">
          <h5>Cari Surat : </h5>
        </div>
        <div class="col-8">
          <input type="text" class="form-control" placeholder="Search" id="search" aria-label="Search" aria-describedby="button-addon2">
        </div>
        <div class="col-2">
          <button type="button" class="btn btn-secondary" id="searchBtn">Cari</button>
        </div>
      </div>
        
      <!-- Table Surat -->
      <div class="card-body table-full-width ">
          <table class="table table-hover table-striped" id="mainTable">
              <thead>
                  <th>Nomor Surat</th>
                  <th style="cursor:pointer">Kategori</th>
                  <th style="cursor:pointer">Judul</th>
                  <th style="cursor:pointer">Waktu Pengarsipan</th>
                  <th style="cursor:pointer">Aksi</th>
              </thead>
              <tbody>
                <tr>
                  @foreach ($surat as $s)
                  <td>{{$s->nomor}}</td>
                  <td>{{$s->kategori}}</td>
                  <td>{{$s->judul}}</td>
                  <td>{{$s->created_at}}</td>
                  <td>
                    <div class="col">
                      <button type="button" class="btn btn-danger" id="btnDelete"  data-id="{{$s->id}}" data-bs-toggle="modal" data-bs-target="#deleteModal">Hapus</button>
                      <!-- <button type="button" id="btnDownload" class="btn btn-warning" data-file="{{$s->file}}" data-judul="{{$s->judul}}">Unduh</button> -->
                      <a download="{{$s->judul}}" href="{{$s->file}}" title='Download pdf document'><button class="btn btn-warning" >Unduh</button></a>
                      <a href="{{url('/surat')}}{{'/'.$s->id}}"> <button type="button" class="btn btn-info">Lihat >></button></a>
                    </div>
                  </td>  
                </tr>
                @endforeach
              </tbody>
          </table>

          <!-- Modal -->
          <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel">Alert</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <p>Apakah anda yakin ingin menghapus arsip surat ini?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <a id="deletefix"><button type="button" class="btn btn-primary">Ya</button></a>
                </div>
              </div>
            </div>
          </div>

          <div class="pt-2">
            <a href="{{url('newData')}}"><button type="button" class="btn btn-primary">Arsipkan Surat</button></a>
          </div>
          
      </div>
    </div>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
 
    <script language="JavaScript" type="text/javascript">
    $(document).ready(function() {
      $("#btnDownload").click(function(event){
        var blob = $(this).data('file');
        var filename = $(this).data('judul').toString()+".pdf";
        console.log(filename);
        var sampleBytes = base64ToArrayBuffer(blob);
        saveByteArray([sampleBytes], filename);
      });

      $("#searchBtn").click(function() {
        search_table($('#search').val());  
      });

      $('#btnDelete').click(function(event){ 
        var id = $(this).data('id');
        $('#deletefix').attr("href", "{{url('/delete')}}"+"/"+id);
      });

      function base64ToArrayBuffer(base64) {
        var binaryString =  window.atob(base64);
        var binaryLen = binaryString.length;
        var bytes = new Uint8Array(binaryLen);
        for (var i = 0; i < binaryLen; i++)        {
            var ascii = binaryString.charCodeAt(i);
            bytes[i] = ascii;
        }
        return bytes;
      }

      var saveByteArray = (function () {
        var a = document.createElement("a");
        document.body.appendChild(a);
        a.style = "display: none";
        return function (data, name) {
            var blob = new Blob(data, {type: "octet/stream"}),
                url = window.URL.createObjectURL(blob);
            a.href = url;
            a.download = name;
            a.click();
            window.URL.revokeObjectURL(url);
        };
      }());

      function search_table(value){  
        $('#mainTable tr').each(function(){  
          var found = 'false';  
          $(this).each(function(){  
            if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
            {  
              found = 'true';  
            }  
          });  
          if(found == 'true')  
          {  
            $(this).show();  
          }  
          else  
          {  
            $(this).hide();  
          }  
        });  
      }      

    });
    

  </script>
  
  </body>

  
</html>
