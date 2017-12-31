@extends('dashboard.file.layoutFile')

@section('title')
File
@endsection

@section('title2')
File
@endsection

@section('isinya')

  @if($errors->any())
  <div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{$errors->first()}}
  </div>
  @endif

@endsection
