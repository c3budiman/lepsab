@extends('dashboard.berita.layoutberita')

@section('isinya')


  <!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header">
          <section class="content-header">
            <h1>
              Mengedit Berita Dan Kegiatan<br>
              <small>Disini anda dapat mengubah Postingan Berita Dan Kegiatan</small>
            </h1>
          </section>
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">
          <form method="post" action="/berita/{{$berita->id}}">
            {{ csrf_field() }}
            <input type="hidden" name="author" value="{{Auth::user()->name}}">
            <input disabled value="{{$berita->judul}}" class="form-control" style="width:100%" type="text" name="judul" placeholder="Judul">
            <br>
                <textarea disabled name="isinya" id="editor1" name="editor1" rows="10" cols="80">
                  {{$berita->content}}
                </textarea>
                <br>
                <input class="btn btn-danger" type="submit" name="submit" value="Delete">
                <a href="/aturberita" class="btn btn-info">Batal</a>
                <input type="hidden" name="_method" value="delete">
          </form>
        </div>
      </div>
      <!-- /.box -->
      </div>
      <!-- /.col-->
</div>
<!-- ./row -->
</section>
<!-- /.content -->
@endsection
