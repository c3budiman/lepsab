@extends('layouts.master')

@section('title2')
Kelulusan {{$kelas}}
@endsection

@section('title')
Kelulusan {{$kelas}}
@endsection

@section('csstambahan')
<style>
      table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
      }

      table, td, th {
      border: 1px solid #000000;
      }

      th, td {
      padding: 7px;
      text-align: center;
      }

      th {
      color: #ffffff;
      background-color: #2c3e50;
      }
      tr:nth-child(odd) {
      background-color: #ffffff;
      }
      tr:nth-child(even) {
      background-color: #f1f0f0;
      }
</style>
@endsection

@section('isinya')
  <div class="section profile-content">
    <div class="container">
      <div class="row">
      <div class="col-md-12 ml-auto mr-auto text-center">
        @if(count($kelulusan))
        <table>
          <thead>
            <tr>
              <th>NPM</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Jurusan</th>
              <th>Periode</th>
              <th>Materi/Workshop</th>
              <th>Status</th>
              <th>Tanggal Ambil Sertifikat</th>
            </tr>
          </thead>
          @foreach($kelulusan as $item)
            <tr>
              <td><b>{{$item->npm}}</b></td>
              <td><b>{{$item->nama}}</b></td>
              <td><b>{{$item->kelas}}</b></td>
              <td><b>{{$item->jurusan}}</b></td>
              <td><b>{{$item->periode}}</b></td>
              <td><b>{{$item->materi}}</b></td>
              <td><b>{{$item->status}}</b></td>
              <td><b>{{$item->ambilser}}</b></td>
            </tr>
          @endforeach
        </table>
        @endif
        <!-- Pagination -->

      </div>
    </div>
    <br>
    <div class="row" style="margin-left:40px">
      {{$kelulusan->links()}}
    </div>
  </div>
</div>
@endsection
