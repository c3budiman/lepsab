<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="assets/img/favicon.ico">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Lembaga Pengembangan Sastra dan Bahasa</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
	  <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	  <link href="assets/css/lepsab.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,300,700' rel='stylesheet' type='text/css'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/nucleo-icons.css" rel="stylesheet" />

</head>

<body>
    <nav class="navbar navbar-expand-md fixed-top navbar-transparent" color-on-scroll="500">
        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler-right navbar-burger" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                    <span class="navbar-toggler-bar"></span>
                </button>
                <a class="navbar-brand" href="http://lepsab.gunadarma.ac.id">Lepsab</a>
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
    <div class="wrapper">
        <div class="page-header section-dark" style="background-image: url('images/banner.gif')">
            <div class="filter"></div>
    		<div class="content-center">
    			<div class="container">
    				<div class="title-brand">
    					<h1 class="presentation-title">Lepsab</h1>
    					<div class="fog-low">
    						<img src="assets/img/fog-low.png" alt="">
    					</div>
    					<div class="fog-low right">
    						<img src="assets/img/fog-low.png" alt="">
    					</div>
    				</div>

    				<h2 class="presentation-subtitle text-center">Lembaga Pengembangan Sastra dan Bahasa</h2>
    			</div>
    		</div>
            <div class="moving-clouds" style="background-image: url('assets/img/clouds.png'); ">

            </div>
    		</h6>
    	</div>
      {{-- end of navbar..... --}}

      {{-- konten nya  --}}
      <div class="main">
        <div class="section text-center">
              <div class="container">
                  <div class="row">
                      <div class="col-md-8 ml-auto mr-auto">
                          <h2 class="title">Apa Itu lepsab?</h2>
                          <h5 class="description">
                            Lepsab adalah lembaga pengembangan sastra dan bahasa,
                              Bagi anda yang ingin mengetahui informasi mengenai website dan informasi bagi anda yang mengikuti kegiatan kursus dan workshop,
                              anda dapat melihatnya di menu navigasi yang telah kita sediakan.
                              Terimakasih.
                          </h5>
                          <br>
                          <a href="/profil" class="btn btn-info btn-round">Lihat Profil</a>
                      </div>
                  </div>
          <br/><br/>
          <div class="row">

            <div class="col-md-6">
              <div class="info">
                <div class="icon icon-info">
                  <img class="img-thumbnail img-responsive" src="images/book.jpg" alt="">
                </div>
                <div class="description">
                  <h4 class="info-title">Lab Bahasa Indonesia</h4>
                  <p>Lab ini dikhususkan bagi anda yang ingin mengetahui dan mendalami ilmu linguistik atau bahasa.
                    Anda akan menemukan pembelajaran yang telah ada dan yang belum anda ketahui sebelumnya.</p>
                  <a href="/lab_indonesia" class="btn btn-link btn-info">Lebih lanjut</a>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="info">
                <div class="icon icon-info">
                  <img class="img-thumbnail img-responsive" src="images/book2.jpg" alt="">
                </div>
                <div class="description">
                  <h4 class="info-title">Lab Bahasa Inggris</h4>
                  <p>Sebuah Lab untuk ilmu bahasa inggris yang mengajarkan tentang ilmu bahasa yang belum anda ketahui sebelumnya</p>
                  <a href="/lab_inggris" class="btn btn-link btn-info">Lebih lanjut</a>
                </div>
              </div>
            </div>
          </div>

              </div>
          </div>




<section class="section-wrap from-blog style-2 pb-90 bg-light">
	<div class="container">
		<div class="row mb-60">
			<div class="col-md-12 text-center">
				<h2>Berita Terbaru</h2>
				<br>
			</div>
		</div>
    <div class="row">
    @foreach ($berita as $beritanya)
      @php
          $re = '/img alt="" src="(.*?)"/';
      @endphp
        <?php if (preg_match_all($re, $beritanya->content, $matches)) {?>
          <div class="col-md-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
      			<div class="blog-col">
      				<div class="entry-img">
      					<img class="img-responsive img-thumbnail" height="250px;" src="{{$matches[1][0]}}" alt="">
      				</div>
      				<div class="entry-box">
      					<h4 class="entry-title"><a href="/berita/{{$beritanya->sluglink}}">{{$beritanya->judul}}</a></h4>
      					<ul class="entry-meta">
      						<li>{{$beritanya->created_at}}</li>
      					</ul>
      					<div class="entry-content">
      						<p>{{$beritanya->excerpt}}</p>
      						<a href="/berita/{{$beritanya->sluglink}}" class="btn btn-info">Baca Selengkapnya</a>
      					</div>
      				</div>
      			</div>
      		</div> <!-- end post -->
          <?php
        } else {
          ?>
          <div class="col-md-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
            <div class="blog-col">
              <div class="entry-img">
                <img src="images/baak.jpg" alt="">
              </div>
              <div class="entry-box">
                <h4 class="entry-title"><a href="/berita/{{$beritanya->sluglink}}">{{$beritanya->judul}}</a></h4>
                <ul class="entry-meta">
                  <li>{{$beritanya->created_at}}</li>
                </ul>
                <div class="entry-content">
                  <p>{{$beritanya->excerpt}}</p>
                  <a href="/berita/{{$beritanya->sluglink}}" class="btn btn-info">Baca Selengkapnya</a>
                </div>
              </div>
            </div>
          </div> <!-- end post -->
          <?php
        } ?>
    @endforeach
  </div>
	</div>
</section> <!-- end from blog -->

    <footer class="footer">
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
<script src="assets/js/jquery-3.2.1.js" type="text/javascript"></script>
<script src="assets/js/jquery-ui-1.12.1.custom.min.js" type="text/javascript"></script>
<script src="assets/js/popper.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Switches -->
<script src="assets/js/bootstrap-switch.min.js"></script>
<!--  Plugins for Slider -->
<script src="assets/js/nouislider.js"></script>
<!--  Plugins for DateTimePicker -->
<script src="assets/js/moment.min.js"></script>
<script src="assets/js/bootstrap-datetimepicker.min.js"></script>
<!--  Paper Kit Initialization and functons -->
<script src="assets/js/paper-kit.js?v=2.1.0"></script>

</html>
