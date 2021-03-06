@extends('dashboard.materi.layout-materi')

@section('title')
Lepsab | Dashboard | Tambah Materi Kursus
@endsection


@section('isinya')
  <div class="col-md-3">

  </div>

  <div class="col-md-6 text-center">
    <div class="box box-info">
      <div class="box-header">
        <section class="content-header">
          <h1>
            Menambah Materi<br>
            <small>Disini anda dapat Menambah Materi</small>
          </h1>
        </section>
      </div>

   <div class="box-body pad">
     @if($errors->any())
         <div class="alert alert-danger alert-dismissible">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         {{$errors->first()}}
         </div>
     @endif

           @if (session('status'))
           <div class="alert alert-info alert-dismissible">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           {{ session('status') }}
           </div>
           @endif
    <form action="/materi/baru" enctype="multipart/form-data" method="post">
      {{ csrf_field() }}
      <div class="form-group">
          <label for="exampleInputEmail1">Nama Materi :</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ex : Bahasa Indonesia 1" name="namafile">
      </div>
      <div class="form-group">
        <label for="exampleInputFile">Input File Materi</label>
        <center>
        <input accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf, image/*" type="file" name="tes" id="exampleInputFile">
        </center>
        <p class="help-block">File yg diterima : pdf, doc, gambar</p>
      </div>
      <input type="hidden" name="author" value="{{Auth::user()->name}}">
      <input class="btn btn-info" type="submit" name="submit" value="Upload">
    </form>
  </div>


</div>

</div>

@endsection
