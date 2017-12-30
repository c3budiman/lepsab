@extends('layouts.master')

@section('title2')
Kelulusan Kursus/Workshop
@endsection

@section('title')
Kelulusan Kursus/Workshop
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
              <th>Materi/Workshop</th>
              <th>Jurusan</th>
              <th>Periode</th>
              <th>Status</th>
              <th>Tanggal Ambil Sertifikat</th>
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
      ajax: '{{ route('kelulusan/api') }}',
      columns: [
          {data: 'npm', name: 'npm'},
          {data: 'nama', name: 'nama'},
          {data: 'kelas', name: 'kelas'},
          {data: 'materi', name: 'materi'},
          {data: 'jurusan', name: 'jurusan'},
          {data: 'periode', name: 'periode'},
          {data: 'status', name: 'status'},
          {data: 'ambilser', name: 'ambilser'},
      ]
  });
});
</script>

@endsection
