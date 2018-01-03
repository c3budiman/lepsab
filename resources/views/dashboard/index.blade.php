@extends('layouts.backend')

@section('title')
  Lepsab | Dashboard
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

  <div class="row">
    @if($errors->any())
    <div class="alert alert-danger alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{$errors->first()}}
    </div>
    @endif
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          @php
            $jumlahberita = DB::table('berita')->count();
          @endphp
          <h3>{{$jumlahberita}}</h3>

          <p>Berita diterbitkan</p>
        </div>
        <div class="icon">
          <i class="ion ion-load-a"></i>
        </div>
        <a href="/aturberita" class="small-box-footer">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          @php
            $jumlahmateri = DB::table('materi')->count();
          @endphp
          <h3>{{$jumlahmateri}}</h3>

          <p>Materi yang diupload</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="/atur-materi" class="small-box-footer">Lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>@php
            $users = DB::table('users')->count();
            echo $users;
          @endphp</h3>

          <p>Pengguna Terdaftar</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="/pengguna" class="small-box-footer">Lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          @php
            $jumlahkelulusan = DB::table('kelulusan')->count();
          @endphp
          <h3>{{$jumlahkelulusan}}</h3>

          <p>Mahasiswa dalam tabel kelulusan</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="/atur-kelulusan" class="small-box-footer">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>

  <!-- START ACCORDION & CAROUSEL-->
  <h2 class="page-header">Cara Penggunaan Situs</h2>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-body">
          <div class="box-group" id="accordion">
            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
            <div class="panel box box-primary">
              <div class="box-header with-border">
                <h4 class="box-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    Pengaturan Berita, Materi, Jadwal, dan Kelulusan
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in">
                <div class="box-body">
                  Untuk mengatur berita, file materi, jadwal dan kelulusan dapat dilihat pada tab edit di masing masing pengaturan.
                  <img src="/storage/tes.png" alt="">
                </div>
              </div>
            </div>
            <div class="panel box box-danger">
              <div class="box-header with-border">
                <h4 class="box-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                    Untuk menjaga keamanan situs
                  </a>
                </h4>
              </div>
              <div id="collapseTwo" class="panel-collapse collapse">
                <div class="box-body">
                  Disarankan menggunakan password yang mudah diingat, dan random,
                  tujuan nya untuk menghindari hacking kepada situs, karena semua user dapat melakukan edit berita dan halaman.
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
  <!-- /.row -->
  <!-- END ACCORDION & CAROUSEL-->

@endsection
