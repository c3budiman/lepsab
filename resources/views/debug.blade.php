@extends('layouts.master');



@section('isinya')
  @foreach ($result as $filegambar)
    <img height="200px;" src="/storage/images/images/{{$filegambar}}" alt="">
  @endforeach
  <script type="text/javascript">
    $("img").on("click",function(){
      console.log($(this).attr("src"));
      $("#cke_127_textInput").val($(this).attr("src"));
    })
  </script>
@endsection
