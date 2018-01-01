@extends('layouts.master')

@section('title2')
Jadwal Kursus/Workshop
@endsection

@section('title')
Jadwal Kursus/Workshop
@endsection

@section('isinya')
  <div class="section profile-content">
    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-bordered datatable" id="datatable users-table">
          <thead>
            <tr>
              <th>NPM</th>
              <th>Nama</th>
              <th>Kelas</th>
              <th>Materi</th>
              <th>Terminal</th>
              <th>Hari</th>
              <th>Waktu</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

  $('.datatable').DataTable({
          "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian-Alternative.json"
      },
      processing: true,
      serverSide: true,
      ajax: '{{ route('jadwal/api') }}',
      columns: [
          {data: 'npm', name: 'npm'},
          {data: 'nama', name: 'nama'},
          {data: 'kelas', name: 'kelas'},
          {data: 'materi', name: 'materi'},
          {data: 'terminal', name: 'terminal'},
          {data: 'hari', name: 'hari'},
          {data: 'waktu', name: 'waktu'},
      ]
  });
});
</script>

@endsection
