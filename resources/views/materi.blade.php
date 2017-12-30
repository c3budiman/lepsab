@extends('layouts.master')

@section('title2')
Materi
@endsection

@section('title')
Materi
@endsection

@section('csstambahan')
  <style media="screen">
    td, th {
      text-align: center;
    }
  </style>
@endsection

@section('isinya')
  <div class="section profile-content">
    <div class="container">
      <div class="row">
      <div class="col-md-12">
        <table class="table table-striped table-bordered datatable">
          <thead class="text-center">
            <tr>
              <th>Nama Modul/Materi</th>
              <th>Download</th>
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
      ajax: '{{ route('materi/api') }}',
      columns: [
          {data: 'nama_materi', name: 'nama_materi'},
          {data: 'action', name: 'action'},
      ]
  });
});
</script>
@endsection
