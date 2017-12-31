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

    <div class="col-md-6 text-center alert alert-success ">
      <div class="box">
        <div class="box-header">
          <section class="content-header ">
            <h1>
              Profil<br>
              <small class="text-left">
                <pre>
                  <p>Nama : {{Auth::user()->name}}</p>
                  <p>Email : {{Auth::user()->email}}</p>
                  <p>Roles : {{DB::table('roles')->select('namaRule')->where('id', '=', Auth::user()->roles_id)->get()->first()->namaRule}}</p>
                  <p>Last Updated at : {{Auth::user()->updated_at}}</p>
                </pre>
              </small>
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
             <div class="form-group">
               <a class="btn btn-info" href="/profile/ubahnama"><i class="fa fa-edit"></i> Ganti nama</a>
               <a class="btn btn-warning" href="/profile/ubahpassword"><i class="fa fa-edit"></i> Ganti password</a>
             </div>
    </div>


  </div>

  </div>

@endsection
