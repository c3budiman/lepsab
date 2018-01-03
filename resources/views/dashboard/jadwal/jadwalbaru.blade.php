@extends('dashboard.jadwal.layoutjadwal')

@section('title')
  Jadwal baru
@endsection


@section('isinya')
  <div class="container">
    <div class="col-md-3">

    </div>

    <div class="col-md-6 text-center">
      <div class="box box-info">
        <div class="box-header">
          <section class="content-header">
            <h1>
              Menambah Jadwal<br>
              <small>Disini anda dapat Menambah Jadwal, perkelas contoh dari format csv yg dapat di upload :
                <br>
                <br>
                <a class="btn btn-xs btn-info" href="/storage/1eb05_datadump.csv">Download</a>
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

      <form action="{{url(action('JadwalController@import'))}}" enctype="multipart/form-data" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="exampleInputFile">Input CSV Jadwal</label>
          <center>
          <input accept=".csv" type="file" name="imported-file" id="exampleInputFile">
          </center>
          <p class="help-block">File yg diterima : csv</p>
        </div>
        <input class="btn btn-info" type="submit" name="submit" value="Upload">
      </form>
    </div>
  </div>

  </div>
@endsection
