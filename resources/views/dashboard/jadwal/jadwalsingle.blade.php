<div class="container">
  <div class="row">
        @if(count($jadwal))
        <table class="table table-striped">
          <thead>
            <tr>
              <td>NPM</td>
              <td>Nama</td>
              <td>Kelas</td>
              <td>Terminal</td>
              <td>Hari</td>
              <td>Waktu</td>
            </tr>
          </thead>
          @foreach($jadwal as $item)
            <tr>
              <td>{{$item->npm}}</td>
              <td>{{$item->nama}}</td>
              <td>{{$item->kelas}}</td>
              <td>{{$item->terminal}}</td>
              <td>{{$item->hari}}</td>
              <td>{{$item->waktu}}</td>
            </tr>
          @endforeach
        </table>
        @endif
      </div>
</div>
