@extends('dashboard.jadwal.layoutjadwal')

@section('title')
  Jadwal
@endsection


@section('isinya')
  <section class="content-header">
    <h1>
      Mengatur Jadwal<br>
      <small>Disini anda dapat mengatur jadwal</small>
    </h1>
  </section>

  <!-- Main content -->
  @if (session('status'))
  <div class="alert alert-info alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  {{ session('status') }}
  </div>
  @endif
  @if(count($jadwal))
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <table id="contoh" class="table table-bordered table-hover datatable">
              <thead>
              <tr>
                <th>Kelas</th>
                <th>Action</th>
              </tr>
              </thead>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
        </div>
</div>
</section>
  @endif

  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
      $('.datatable').DataTable({
              "language": {
              "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian-Alternative.json"
          },
          processing: true,
          serverSide: true,
          ajax: '{{ route('jadwal/json') }}',
          columns: [
              {data: 'kelas', name: 'kelas'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
  });
  </script>
@endsection
