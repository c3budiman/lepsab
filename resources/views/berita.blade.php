@extends('layouts.master')

@section('title')
  Lepsab | Berita Dan Kegiatan
@endsection

@section('title2')
  Berita Dan Kegiatan
@endsection

@section('isinya')
  <!-- Blog Standard -->
    <section style="padding-top:100px;" class="section-wrap blog-standard bg-light">
      <div class="container relative">
        <div class="row">

          <!-- content -->
          <div class="col-md-9 col-sm-8 blog-content">
            <?php
            foreach ($berita as $beritanya) {
              $re = '/img alt="" src="(.*?)"/';
              if(preg_match_all($re, $beritanya->content, $matches)){ ?>
                <!-- standard post -->
                <div class="entry-item">
                  <div class="entry-img">
                    <a href="/berita/{{$beritanya->sluglink}}">
                      <img class="img-responsive img-thumbnail" src="{{$matches[1][0]}}" alt="">
                    </a>
                  </div>
                  <div class="entry">
                    <h2 class="entry-title">
                      <a href="/berita/{{$beritanya->sluglink}}">{{ucwords($beritanya->judul)}}</a>
                    </h2>
                    <ul class="entry-meta">
                      <li class="entry-date">
                        <i class="fa fa-calendar-o"></i><a href="#">{{$beritanya->created_at}}</a>
                      </li>
                      <li class="entry-author">
                        <i class="fa fa-user"></i><a href="#">{{$beritanya->author}}</a>
                      </li>
                    </ul>
                    <div class="entry-content">
                      <p>{{$beritanya->excerpt}}</p>
                      <a href="berita/{{$beritanya->sluglink}}" class="btn btn-stroke btn-md">Read More</a>
                    </div>
                  </div>
                </div> <!-- end entry item -->
              <?php
                }
              else {
                ?>
                  <div class="entry-item">
                    <div class="entry">
                      <h2 class="entry-title">
                        <a href="/berita/{{$beritanya->sluglink}}">{{ucwords($beritanya->judul)}}</a>
                      </h2>
                      <ul class="entry-meta">
                        <li class="entry-date">
                          <i class="fa fa-calendar-o"></i><a href="#">{{$beritanya->created_at}}</a>
                        </li>
                        <li class="entry-author">
                          <i class="fa fa-user"></i><a href="#">{{$beritanya->author}}</a>
                        </li>
                      </ul>
                      <div class="entry-content">
                        <p>{{$beritanya->excerpt}}</p>
                        <a href="berita/{{$beritanya->sluglink}}" class="btn btn-stroke btn-md">Read More</a>
                      </div>
                    </div>
                  </div> <!-- end entry item -->
                <?php
              }

            }
            ?>



            <!-- Pagination -->
            <nav style="margin-bottom:20px;" class="pagination clear">
              {{-- <a href="#"><i class="fa fa-angle-left"></i></a>
              <span class="page-numbers current">1</span>
              <a href="#">2</a>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#"><i class="fa fa-angle-right"></i></a> --}}
              {{$berita->links()}}
            </nav>

          </div> <!-- end col -->

          <!-- sidebar -->
          <div class="col-md-3 col-sm-4 sidebar blog-sidebar mt-sml-50">

            <form class="relative">
              <input type="search" class="form-control searchbox" placeholder="Search">
              <button type="submit" class="search-button"><i class="fa fa-search"></i></button>
            </form>


            <!-- Categories -->
            <div class="widget categories">
              <h3 class="widget-title">UG Sites</h3>
              <ul>
                <li>
                  <a href="http://studentsite.gunadarma.ac.id">Studentsite</a>
                </li>
                <li>
                  <a href="http://baak.gunadarma.ac.id">BAAK</a>
                </li>
                <li>
                  <a href="#">UG library</a>
                </li>
                <li>
                  <a href="#">OCW</a>
                </li>
                <li>
                  <a href="#">E-Learning</a>
                </li>
              </ul>
            </div>

          </div> <!-- end col -->

        </div> <!-- end row -->
      </div> <!-- end container -->
    </section> <!-- end blog standard -->
@endsection
