@extends('layouts.backend')

@section('title')
  Lepsab | Pengguna
@endsection

@section('sidebarmenu')
  <!-- Sidebar Menu -->
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">HEADER</li>
  <!-- Optionally, you can add icons to the links -->
  <li class="active"><a href="/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
  <li><a href="/pengguna"><i class="fa fa-users"></i> <span>Mengatur Pengguna</span></a></li>
  <li><a href="#"><i class="fa fa-bar-chart"></i> <span>Melihat Analytic</span></a></li>

  <li class="treeview">
    <a href="#"><i class="fa fa-newspaper-o"></i> <span>Mengatur Berita</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="/aturberita"><i class="fa fa-edit"></i> Lihat/Edit/Hapus berita</a></li>
      <li><a href="/berita/baru"><i class="fa fa-plus"></i> Tambah Berita</a></li>
    </ul>
  </li>

  <li class="treeview">
    <a href="#"><i class="fa fa-file"></i> <span>Mengatur Materi Kursus</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="/atur-materi"><i class="fa fa-edit"></i>Edit/Hapus Materi</a></li>
      <li><a href="/materi/baru"><i class="fa fa-plus"></i>Tambah Materi</a></li>
    </ul>
  </li>

  <li class="treeview">
    <a href="#"><i class="fa fa-suitcase"></i> <span>Mengatur Jadwal</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="/atur-jadwal"><i class="fa fa-edit"></i>Lihat/Edit/Hapus jadwal</a></li>
      <li><a href="/jadwal/baru"><i class="fa fa-plus"></i>Tambah jadwal</a></li>
    </ul>
  </li>

  <li class="treeview">
    <a href="#"><i class="fa fa-graduation-cap"></i> <span>Mengatur Kelulusan</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="/atur-kelulusan"><i class="fa fa-edit"></i>Lihat/Edit/Hapus kelulusan</a></li>
      <li><a href="/kelulusan/baru"><i class="fa fa-plus"></i>Tambah kelulusan Batch</a></li>
      <li><a href="/kelulusan/baru/satuan"><i class="fa fa-plus"></i>Tambah kelulusan Single</a></li>
    </ul>
  </li>
</ul>
<!-- /.sidebar-menu -->
@endsection

@section('isinya')
    <div class="col-md-3">

    </div>
    <div class="col-md-6">
  <!-- Horizontal Form -->
  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Ubah Password</h3>
    </div>
    @if (session('status'))
    <div class="alert alert-info alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session('status') }}
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{$errors->first()}}
    </div>
    @endif
    <!-- /.box-header -->
    <!-- form start -->
    <form method="post" action="{{url(action('BackendController@postGantiPassword'))}}" class="form-horizontal">
      {{ csrf_field() }}
      <div class="box-body">
        <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">Password Lama</label>

          <div class="col-sm-9">
            <input name="password" type="password" class="form-control" id="inputEmail3" placeholder="password lama">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-3 control-label">Password Baru</label>

          <div class="col-sm-9">
            <input name="password21" type="password" class="form-control" id="inputPassword3" placeholder="Password Baru">
          </div>
        </div>

        <div class="form-group">
          <label for="inputPassword4" class="col-sm-3 control-label">Password Baru</label>

          <div class="col-sm-9">
            <input name="password22" type="password" class="form-control" id="inputPassword4" placeholder="Konfirmasi Password Baru">
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <a href="/profile" class="btn btn-default">Batal</a>
        <button type="submit" class="btn btn-success pull-right">Ubah</button>
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
  <!-- /.box -->

@endsection
