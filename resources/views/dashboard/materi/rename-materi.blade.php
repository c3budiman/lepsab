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
            Mengedit Materi<br>
            <small>Disini anda dapat Mengubah Nama Materi</small>
          </h1>
        </section>
      </div>

   <div class="box-body pad">
    <form action="/materi/{{$materi->id}}" enctype="multipart/form-data" method="post">
      {{ csrf_field() }}
      <div class="form-group">
          <label for="exampleInputEmail1">Nama Materi :</label>
          <input type="text" class="form-control" id="exampleInputEmail1" value="{{$materi->nama_materi}}" name="namafile">
      </div>
      <input type="hidden" name="author" value="{{Auth::user()->name}}">
      <input class="btn btn-info" type="submit" name="submit" value="Upload">
      <input type="hidden" name="_method" value="PUT">
    </form>
  </div>
</div>
</div>

@endsection
