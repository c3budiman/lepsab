<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/favicon.ico">
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>@yield('title')</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://code.jquery.com/jquery.js"></script>
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
		<link href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet">
		<!-- Bootstrap core CSS     -->
	  <link href="{{ URL::asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
	  <link href="{{ URL::asset('assets/css/lepsab.css') }}" rel="stylesheet"/>

	@yield('csstambahan')

    <!--     Fonts and icons     -->
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link href="/assets/css/nucleo-icons.css" rel="stylesheet">
	<script id="dsq-count-scr" src="http://lepsab.disqus.com/count.js" async></script>

</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent" color-on-scroll="300">
        <div class="container">
			<div class="navbar-translate">
				<a class="navbar-brand" href="/lab_indonesia">Lepsab | B.Indonesia</a>
	            <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
					<span class="navbar-toggler-bar"></span>
	            </button>
			</div>
	        <div class="collapse navbar-collapse" id="navbarToggler">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="/berita" target="_blank" class="nav-link"><i class="nc-icon nc-paper"></i> Berita </a>
                </li>
                <li class="nav-item">
                    <a href="/kursus" target="_blank" class="nav-link"><i class="nc-icon nc-badge"></i> Kursus/Workshop</a>
                </li>
                <li class="nav-item">
                    <a href="/jadwal" target="_blank" class="nav-link"><i class="nc-icon nc-calendar-60"></i> Jadwal </a>
                </li>
                <li class="nav-item">
                    <a href="/kelulusan" target="_blank" class="nav-link"><i class="nc-icon nc-trophy"></i> Kelulusan </a>
                </li>
                <li class="nav-item">
                    <a href="/materi" target="_blank" class="nav-link"><i class="nc-icon nc-book-bookmark"></i> Materi </a>
                </li>
                <li class="nav-item">
                    <a href="/kontak" target="_blank" class="nav-link"><i class="nc-icon nc-alert-circle-i"></i> Kontak</a>
                </li>
            </ul>
	        </div>
		</div>
    </nav>

		<div class="page-header" data-parallax="true" style="background-image: url('images/book.jpg');">
			<div class="filter"></div>
			<div class="container">
			    <div class="motto text-center">
			        <h1>Lab Bahasa Indonesia</h1>
			        <h3>Ini adalah landing page Lab Bahasa Indonesia.</h3>
			    </div>
			</div>
    	</div>

      <div style="margin-top:220px" class="separator">

      </div>
    <div class="main">
			<div class="section text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 ml-auto mr-auto">
                        <h2 class="title">Tentang</h2>
                        <h5 class="description">Lab ini dikhususkan bagi anda yang ingin mengetahui dan mendalami ilmu linguistik atau bahasa.
Anda akan menemukan pembelajaran yang telah ada dan yang belum anda ketahui sebelumnya.</h5>
                        <br>
                        <a href="#paper-kit" class="btn btn-danger btn-round">Lebih lanjut</a>
                    </div>
                </div>
				<br/><br/>
				<div class="row">
					<div class="col-md-3">
						<div class="info">
							<div class="icon icon-danger">
								<i class="nc-icon nc-album-2"></i>
							</div>
							<div class="description">
								<h4 class="info-title">Beautiful Gallery</h4>
								<p class="description">Spend your time generating new ideas. You don't have to think of implementing.</p>
								<a href="#pkp" class="btn btn-link btn-danger">See more</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="info">
							<div class="icon icon-danger">
								<i class="nc-icon nc-bulb-63"></i>
							</div>
							<div class="description">
								<h4 class="info-title">New Ideas</h4>
								<p>Larger, yet dramatically thinner. More powerful, but remarkably power efficient.</p>
								<a href="#pkp" class="btn btn-link btn-danger">See more</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="info">
							<div class="icon icon-danger">
								<i class="nc-icon nc-chart-bar-32"></i>
							</div>
							<div class="description">
								<h4 class="info-title">Statistics</h4>
								<p>Choose from a veriety of many colors resembling sugar paper pastels.</p>
								<a href="#pkp" class="btn btn-link btn-danger">See more</a>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="info">
							<div class="icon icon-danger">
								<i class="nc-icon nc-sun-fog-29"></i>
							</div>
							<div class="description">
								<h4 class="info-title">Delightful design</h4>
								<p>Find unique and handmade delightful designs related items directly from our sellers.</p>
								<a href="#pkp" class="btn btn-link btn-danger">See more</a>
							</div>
						</div>
					</div>
				</div>

            </div>
        </div>

		<div class="section section-dark text-center">
            <div class="container">
                <h2 class="title">Pengumuman Terbaru</h2>
				<div class="row">

    			</div>
        	</div>
    	</div>

        </div>
	<footer class="footer section-dark">
		<div class="container">
			<div class="row">
				<nav class="footer-nav">
					<ul>
            <li><a href="#">Gunadarma University</a></li>
            <li><a href="#">Perpustakaan</a></li>
            <li><a href="#">Studentsite</a></li>
					</ul>
				</nav>
				<div class="credits ml-auto">
					<span class="copyright">
						© <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by GUCC
					</span>
				</div>
			</div>
		</div>
	</footer>
</body>

<!-- Core JS Files -->
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="{{ URL::asset('assets/js/jquery-ui-1.12.1.custom.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/popper.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap.min.js')}}"></script>
<!-- Switches -->
<script src="{{ URL::asset('assets/js/bootstrap-switch.min.js')}}"></script>
<!--  Plugins for Slider -->
<script src="{{ URL::asset('assets/js/nouislider.js')}}"></script>
<!--  Plugins for DateTimePicker -->
<script src="{{ URL::asset('assets/js/moment.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
<!--  Paper Kit Initialization and functons -->
<script src="{{ URL::asset('assets/js/paper-kit.js?v=2.1.0')}}"></script>

</html>
