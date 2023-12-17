@extends('template.master')

@push('css')
  <!-- DataTables -->
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush
@section('content')
<body>
  @can('isAdmin')
    <!-- Content Header (Page header) -->
          <h1 class="fw-semibold text-center py-3">
            Data Jadwal
          </h1>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
                  <a href="{{ route('jadwal.create', $gym[0]->id) }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus"></i> Create
                  </a>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Gym</th>
                    <th>Nama Pelatih</th>
                    <th>Senin</th>
                    <th>Selasa</th>
                    <th>Rabu</th>
                    <th>Kamis</th>
                    <th>Jumat</th>
                    <th>Sabtu</th>
                    <th>Minggu</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($jadwal as $key => $value)
                    <tr>
                        <td>{{ $key +1 }} </td>
                        <td>{{ $value->gym->nama_gym }}</td>
                        <td>{{ $value->pelatih->nama_pelatih }}</td>
                        <td>{{ $value->senin}}</td>
                        <td>{{ $value->selasa}}</td>
                        <td>{{ $value->rabu}}</td>
                        <td>{{ $value->kamis}}</td>
                        <td>{{ $value->jumat}}</td>
                        <td>{{ $value->sabtu}}</td>
                        <td>{{ $value->minggu}}</td>
                        <td class="d-flex" style="gap:10px">
                          <a href="{{ route('reservasi.create', $gym[0]->id)}}" class="btn btn-sm btn-primary">
                            <i class="nav-icon fas fa-calendar-check"></i>
                          </a>
                            <a href="{{ route('jadwal.edit', $value->id)}}" class="btn btn-sm btn-warning">
                              <i class="nav-icon fas fa-pen"></i>
                            </a>
                            <form action="{{ route('jadwal.destroy', $value->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></button>
                              </form>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            {{-- </div>
            <!-- /.card -->
          </div> --}}
          <!-- /.col -->
        </div>
</div>
        <!-- /.row -->
      <!-- /.container-fluid -->
    </section>

    @elsecan('isUser')

    <!-- Content Header (Page header) -->
    <h1 class="fw-semibold text-center py-3">
      Jadwal Pelatih Gym
    </h1>
<!-- Main content -->
<section class="content">
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <a href="{{ route('reservasi.create', $gym[0]->id) }}"
        class="btn btn-sm btn-primary float-right">
        <i class="nav-icon fas fa-calendar-check"></i> Booking
      </a>
          </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Nama Gym</th>
              <th>Nama Pelatih</th>
              <th>Senin</th>
              <th>Selasa</th>
              <th>Rabu</th>
              <th>Kamis</th>
              <th>Jumat</th>
              <th>Sabtu</th>
              <th>Minggu</th>
            </tr>
            </thead>
            <tbody>
              @foreach($jadwal as $key => $value)
              <tr>
                  <td>{{ $key +1 }} </td>
                  <td>{{ $value->gym->nama_gym }}</td>
                  <td>{{ $value->pelatih->nama_pelatih }}</td>
                  <td>{{ $value->senin}}</td>
                  <td>{{ $value->selasa}}</td>
                  <td>{{ $value->rabu}}</td>
                  <td>{{ $value->kamis}}</td>
                  <td>{{ $value->jumat}}</td>
                  <td>{{ $value->sabtu}}</td>
                  <td>{{ $value->minggu}}</td>
                  
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
  </div>
</div>
<div class="card-footer">
  <a href="{{ route('gym.show',  $gym[0]->id) }}" class="btn btn-sm btn-success">Kembali</a>
</div>
</section>
@endcan
</body>
@endsection
@push('script')
<!-- DataTables  & Plugins -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    $
  });
</script>
@endpush

