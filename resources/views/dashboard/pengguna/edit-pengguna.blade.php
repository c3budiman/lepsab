@extends('dashboard.pengguna.layout')
@section('isinya')
  <section class="content-header">
    <h1>
      Mengatur Pengguna<br>
      <small>Disini anda dapat mengatur pengguna situs ini</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
      <li class="active">Here</li>
    </ol>
  </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Edit Pengguna ID : {{$user->id}}</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="post" action="/pengguna/{{$user->id}}">
                    {{ csrf_field() }}
                    <div class="box-body">
                      <div class="form-group">
                        <label for="">Nama Pengguna</label>
                        <input type="text" name="nama" class="form-control" value="{{$user->name}}">
                      </div>
                      <div class="form-group">
                        <label for="">Email Pengguna</label>
                        <input type="email" name="email" class="form-control" value="{{$user->email}}" >
                      </div>
                      <div class="form-group">
                        <label for="">Roles Pengguna</label>
                        <select class="form-control" name="roles">
                          @php
                            $roles = DB::table('roles')->get();
                          @endphp
                          @foreach ($roles as $role)
                            <option class="form-control" value="{{$role->id}}">{{$role->namaRule}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="box-footer">
                      <input class="btn btn-info" type="submit" name="submit" value="submit">
                      <input type="hidden" name="_method" value="PUT">
                    </div>
                    </form>
                    </div>
        </div>
      </div>
    </section>
@endsection
