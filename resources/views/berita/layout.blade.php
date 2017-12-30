@extends('layouts.master')

@section('title')
  Lepsab | Berita | {{$beritanya->judul}}
@endsection

@section('title2')
  {{$beritanya->judul}}
@endsection

@section('isinya')
  <div  class="main-wrapper oh">

    <!-- Blog Single -->
    <section style="padding-top:20px;" class="section-wrap blog-single bg-light">
      <div class="container relative">
        <div class="row">

          <!-- content -->
          <div style="margin-bottom:40px;" class="col-md-9 col-sm-8 blog-content">

            <!-- standard post -->
            <div class="entry-item mb-0">
              <div class="entry-img">
                <a href="blog-single.html">
                  <img src="img/blog/post_img_1.jpg" alt="">
                </a>
              </div>

              <div class="entry">

                <h1 class="entry-title">
                  <a href="/berita/{{$beritanya->sluglink}}">{{$beritanya->judul}}</a>
                </h1>

                <ul class="entry-meta">
                  <li class="entry-date">
                    <i class="fa fa-calendar-o"></i><a href="#">{{$beritanya->created_at}}</a>
                  </li>
                  <li class="entry-author">
                    <i class="fa fa-user"></i><a href="#">{{$beritanya->author}}</a>
                  </li>
                </ul>
                <div class="entry-content">
                  @php
                    print_r($beritanya->content);
                  @endphp
                  {{-- end content --}}

                </div> <!-- end endtry content -->

              </div>
            </div> <!-- end entry item -->

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
