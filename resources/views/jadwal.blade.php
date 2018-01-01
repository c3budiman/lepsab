@extends('layouts.master')

@section('title2')
Jadwal {{$kelas}}
@endsection

@section('title')
Jadwal {{$kelas}}
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
      <div class="col-xs-12 ml-auto mr-auto text-center">
        @if(count($jadwal))
        <table>
          <thead>
            <tr>
              <th>NPM</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Materi Kursus/Workshop</th>
              <th>Terminal</th>
              <th>Hari</th>
              <th>Waktu</th>
            </tr>
          </thead>
          @foreach($jadwal as $item)
            <tr>
              <td><b>{{$item->npm}}</b></td>
              <td><b>{{$item->nama}}</b></td>
              <td><b>{{$item->kelas}}</b></td>
              <td><b>{{$item->materi}}</b></td>
              <td><b>{{$item->terminal}}</b></td>
              <td><b>{{$item->hari}}</b></td>
              <td><b>{{$item->waktu}}</b></td>
            </tr>
          @endforeach
        </table>
        @endif
        <!-- Pagination -->

      </div>
    </div>
    <br>
    <div class="row" style="margin-left:40px">
      {{$jadwal->links()}}
    </div>
  </div>
</div>
@endsection
