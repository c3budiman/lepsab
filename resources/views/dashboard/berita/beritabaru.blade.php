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
              Menambah Berita Dan Kegiatan<br>
              <small>Disini anda dapat Menambah Postingan Berita Dan Kegiatan</small>
            </h1>
          </section>
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">
          <form method="post" action="{{url(action('BackendController@postBeritaBaru'))}}">
            {{ csrf_field() }}
            <input type="hidden" name="author" value="{{Auth::user()->name}}">
            <input class="form-control" style="width:100%" type="text" name="judul" placeholder="Judul">
            <br>
                <textarea name="isinya" id="editor1" name="editor1" rows="10" cols="80">

                </textarea>
                <br>
                <label for="">Jenis Berita : </label>
                <select class="form-control" name="jenis">
                  <option value="berita_umum">Berita Umum</option>
                  <option value="berita_indo">Berita Lab B.Indo</option>
                  <option value="berita_inggris">Berita Lab B.Ing</option>
                  <option value="berita_workshop">Berita Workshop</option>
                </select>
                <br>
                <input class="pull-right btn btn-lg btn-info" type="submit" name="submit" value="Post">
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
