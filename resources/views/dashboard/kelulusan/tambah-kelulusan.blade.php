@extends('dashboard.kelulusan.layout-kelulusan')

@section('title')
  Kelulusan baru
@endsection


@section('isinya')
  <div class="container">
    <div class="row">
      <div class="col-md-3">

      </div>

      <div class="col-md-6 text-center">
        <div class="box box-info">
          <div class="box-header">
            <section class="content-header">
              <h1>
                Menambah Kelulusan<br>
                <small>Disini anda dapat Menambah Kelulusan, perkelas, dan perseorangan contoh dari format csv yg dapat di upload : </small>
              </h1>
            </section>
          </div>

       <div class="box-body pad">
         <br>
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

        <form action="{{url(action("BackendController@postTambahKelulusan"))}}" enctype="multipart/form-data" method="post">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="exampleInputFile">Input CSV Kelulusan</label>
            <center>
            <input accept=".csv" type="file" name="imported-file" id="exampleInputFile">
            </center>
            <p class="help-block">File yg diterima : csv</p>
          </div>
          <input class="btn btn-info" type="submit" name="submit" value="Upload">
        </form>
      </div>
    </div>
    <div class="col-md-3">

    </div>
    </div>
  </div>
@endsection
