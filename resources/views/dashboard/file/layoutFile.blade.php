<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
  <script src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
  <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ URL::asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ URL::asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ URL::asset('dist/css/AdminLTE.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ URL::asset('bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ URL::asset('bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ URL::asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ URL::asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('bower_components/select2/dist/css/select2.min.css') }}">

  <style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>
  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>LPSB</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Lepsab</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{ asset('images/buku.jpg')}}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->

              <span class="hidden-xs"><?php
              echo Auth::user()->name;
              ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{ asset('images/buku.jpg')}}" class="img-circle" alt="User Image">

                <p>
                  <?php
                  echo Auth::user()->name;
                  $roles = DB::table('roles')->get();
                  $idna = Auth::user()->roles_id;
                  $rolesna = DB::table('roles')->select('namaRule')->where('id', '=', $idna)->get()->first()->namaRule;
                  echo " - " . $rolesna;
                  ?>
                  <small>Member since <?php echo Auth::user()->created_at; ?></small>
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/profile" class="btn btn-default btn-flat">Profil</a>
                </div>
                <div class="pull-right">
                  <a href="/logout" class="btn btn-default btn-flat">Log out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('images/buku.jpg')}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p> @php
            echo Auth::user()->name;
          @endphp</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->
      <li><a href="/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
      <li><a href="/pengguna"><i class="fa fa-users"></i> <span>Mengatur Pengguna</span></a></li>
      <li><a href="#"><i class="fa fa-bar-chart"></i> <span>Melihat Analytic</span></a></li>

      <li class="active treeview">
        <a href="#"><i class="fa fa-suitcase"></i> <span>Mengatur File</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="/file"><i class="fa fa-edit"></i>Lihat/Edit/Hapus File</a></li>
          <li><a href="/file/baru"><i class="fa fa-plus"></i>Tambah File</a></li>
        </ul>
      </li>

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
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <!-- Main content -->
    <section class="content container-fluid">
    @yield('isinya')

    </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- Default to the left -->
    <p>Copyright - <b> <a href="/">Lepsab</a> 2017 &copy; </b> Designed by <b> <a href="http://c3budiman.web.id/">C3budiman</a> </b> .</p>
  </footer>

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

@yield('modal')

<script type="text/javascript">
$(document).ready(function() {
  $('.js-example-basic-single').select2();
});
</script>

<!-- CK Editor -->
<script src="{{ URL::asset('bower_components/ckeditor/ckeditor.js') }}"></script>
<!-- Select2 -->
<script src="{{ URL::asset('bower_components/select2/dist/js/select2.full.min.js')}}"></script>
<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 3 -->

<!-- Bootstrap 3.3.7 -->
<script src="{{ URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ URL::asset('dist/js/adminlte.min.js')}}"></script>

<script src="{{ URL::asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{ URL::asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->

<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1')
    //bootstrap WYSIHTML5 - text editor
    $('.textarea').wysihtml5()
  })
</script>
</body>
</html>
