@extends('dashboard.pengguna.layoutdt')

@section('content')
  <div class="table-responsive">


    <table class="table table-bordered datatable" id="datatable users-table">
        <thead>
            <tr>
                <th>npm</th>
                <th>nama</th>
                <th>kelas</th>
                <th>aksi</th>
            </tr>
        </thead>
    </table>
    </div>



@stop

@section('scripts')
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
      $('.datatable').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{ route('datatable/getdata') }}',
          columns: [
              {data: 'npm', name: 'npm'},
              {data: 'nama', name: 'nama'},
              {data: 'kelas', name: 'kelas', orderable: false, searchable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
  });
  </script>
@endsection
