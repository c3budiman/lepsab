@extends('layouts.backend')

@section('title')
  Mengatur Pengguna
@endsection

@section('sidebarmenu')
  <!-- Sidebar Menu -->
<ul class="sidebar-menu" data-widget="tree">
  <li class="header">HEADER</li>
  <!-- Optionally, you can add icons to the links -->
  <li><a href="/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
  <li class="active"><a href="/pengguna"><i class="fa fa-users"></i> <span>Mengatur Pengguna</span></a></li>
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
  <!-- Content Header (Page header) -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Mengatur Pengguna<br>
      <small>Disini anda dapat mengatur pengguna situs ini</small>
    </h1>
  </section>
  <br>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body">

          <table id="contoh" class="table table-bordered table-hover datatable">
            <thead>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Roles</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Roles</th>
              <th>Action</th>
            </tr>
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->

      <div class="box-body">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-user">
          Tambah User
        </button>
      </div>


@endsection


@section('modal')
  <div class="modal fade" id="add-user">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah User</h4>
        </div>
        <div class="modal-body">
          <div class="box box-info">
              <div class="box-body">
                <form class="" action="{{url(action('BackendController@posregisnya'))}}" method="post">
                 {{ csrf_field() }}
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" name="nama" placeholder="Nama">
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <br>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batalkan</button>
          <button type="submit" class="btn btn-primary" value="submit">Tambah User</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->

  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
      $('.datatable').DataTable({
              "language": {
              "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian-Alternative.json"
          },
          processing: true,
          serverSide: true,
          ajax: '{{ route('pengguna/json') }}',
          columns: [
              {data: 'name', name: 'name'},
              {data: 'email', name: 'email'},
              {data: 'roles', name: 'roles'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
  });
  </script>

@endsection
