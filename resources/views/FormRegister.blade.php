<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

	<!-- Bootstrap core CSS     -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/lepsab.css" rel="stylesheet"/>

	<link href="assets/css/demo.css" rel="stylesheet" />

    <!--     Fonts and icons     -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="assets/css/nucleo-icons.css" rel="stylesheet">

    <title>Register BACKEND | Lembaga Pengembangan Sastra dan Bahasa</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-md fixed-top navbar-transparent">
    <div class="container">
  <div class="navbar-translate">
          <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-bar"></span>
      <span class="navbar-toggler-bar"></span>
      <span class="navbar-toggler-bar"></span>
          </button>
          <a class="navbar-brand" href="/">Lepsab</a>
  </div>
  <div class="collapse navbar-collapse" id="navbarToggler">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="/berita" target="_blank" class="nav-link"><i class="nc-icon nc-paper"></i> Berita Dan Kegiatan</a>
            </li>
            <li class="nav-item">
                <a href="/kursus" target="_blank" class="nav-link"><i class="nc-icon nc-badge"></i> Kursus/Workshop</a>
            </li>
            <li class="nav-item">
                <a href="/kontak" target="_blank" class="nav-link"><i class="nc-icon nc-alert-circle-i"></i> Kontak</a>
            </li>
          </ul>
      </div>
</div>
</nav>
<div class="wrapper">
    <div class="page-header" style="background-image: url('images/banner.gif');">
        <div class="filter"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 ml-auto mr-auto">
                        <div class="card card-register">
                            <h3 class="title">Selamat Datang</h3>
                            <form action="{{url(action('regisController@postRegis'))}}" class="register-form" method="post">
                              {{ csrf_field() }}
                                <label>Email</label>
                                <input name="email" type="text" class="form-control" placeholder="Email">

                                <label>Nama</label>
                                <input name="nama" type="text" class="form-control" placeholder="Email">

                                <label>Password</label>
                                <input name="password" type="password" class="form-control" placeholder="Password">
                                <button class="btn btn-info btn-block btn-round">Log In</button>
                            </form>
                        </div>
                    </div>
                </div>
      <div class="footer register-footer text-center">
        <h6>© <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by GUCC</h6>
      </div>
            </div>
    </div>
</div>

<!-- Core JS Files -->
<script src="assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="assets/js/tether.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

<script src="assets/js/paper-kit.js?v=2.0.1"></script>
  </body>
</html>
