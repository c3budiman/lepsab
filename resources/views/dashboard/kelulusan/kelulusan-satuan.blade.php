@extends('dashboard.kelulusan.layout-kelulusan')
@section('isinya')
  <section class="content-header">
    <h1>
      Menambah Kelulusan<br>
      <small>Disini anda dapat menambah kelulusan seseorang</small>
    </h1>
  </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Tambah Kelulusan</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="post" action="{{url(action("BackendController@postTambahKelulusan"))}}">
                    {{ csrf_field() }}
                    <div class="box-body">
                      <div class="form-group">
                        <label for="">NPM</label>
                        <input type="text" name="npm" class="form-control" placeholder="12345678">
                      </div>
                      <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Budi">
                      </div>
                      <div class="form-group">
                        <label for="">Kelas</label>
                        <input type="text" name="kelas" class="form-control" placeholder="3KA01">
                      </div>
                      <div class="form-group">
                        <label for="">Jurusan</label>
                        <input type="text" name="jurusan" class="form-control" placeholder="Sistem Informasi">
                      </div>
                      <div class="form-group">
                        <label for="">Periode</label>
                        <input type="text" name="periode" class="form-control" placeholder="6 / ATA 2016-2017 / 2014">
                      </div>
                      <div class="form-group">
                        <label for="">Materi/Workshop</label>
                        <input type="text" name="materi" class="form-control" placeholder="Workshop B.Inggris">
                      </div>
                      <div class="form-group">
                        <label for="">Status</label>
                        <input type="text" name="status" class="form-control" placeholder="LULUS">
                      </div>
                      <div class="form-group">
                        <label for="">Tanggal Ambil Sertifikat</label>
                        <input type="text" name="ambilser" class="form-control" placeholder="17-September-2017">
                      </div>
                    </div>
                    <div class="box-footer">
                      <input class="btn btn-info" type="submit" name="submit" value="submit">
                    </div>
                    </form>
                    </div>
        </div>
      </div>
    </section>
@endsection
