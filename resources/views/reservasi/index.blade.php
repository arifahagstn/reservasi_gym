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
    Data Reservasi
  </h1>
<!-- Main content -->
<section class="content">
<div class="container-fluid">
<div class="row">
  <div class="col-12">
          <a href="{{ URL::to('/pdf') }}" class="btn btn-sm btn-success">
            <i class="fas fa-print"></i> Print PDF
          </a>
        </div>
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
          <tr>
                <th>No</th>
                <th>Nama User</th>
                <th>Nama Gym</th>
                <th>Tanggal Reservasi</th>
                <th>Jam Reservasi</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reservasi as $key => $value)
                <tr>
                    <td>{{ $key +1 }}</td>
                    <td>{{ $value->user->name }}</td>
                    <td>{{ $value->gym->nama_gym }}</td>
                    <td>{{ $value->tanggal_reservasi }}</td>
                    <td>{{ $value->jam_reservasi }}</td>
                    <td>{{ $value->status }}</td>
                    <td class="d-flex" style="gap:10px">
                        <a href="{{ route('reservasi.edit', $value->id)}}" class="btn btn-sm btn-warning">
                          <i class="nav-icon fas fa-pen"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
      </div>
      </div>
      </div>
    </section>

    @elsecan('isUser')

    <div class="container mt-5">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-1">
                      <a href="{{ route('gym.index')}}">
                        <img src="{{ asset('assets/icon/arrow.png') }}" alt="Back" style="width: 25px; height: 25px">
                      </a>
                      </div>
                      <div class="col-10">
                      <h2 class="fw-semibold text-center pt-3 mb-0 pb-0">Konfirmasi Reservasi</h2>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                    @if(count($reservasi) > 0)
                        <?php $value = $reservasi[0]; ?>
                        <p>Terima kasih atas reservasi Anda di Gym kami. Berikut adalah rincian reservasi:</p>
                        <ul>
                            <li><strong>Nama Gym :</strong> {{ $value->gym->nama_gym }}</li>
                            <li><strong>Nama Pelatih :</strong> {{ $value->pelatih->nama_pelatih }}</li>
                            <li><strong>Tanggal Reservasi :</strong> {{ $value->tanggal_reservasi }}</li>
                            <li><strong>Jam Reservasi :</strong> {{ $value->jam_reservasi }}</li>
                        </ul>
                        <p>Total biaya reservasi: {{ $value->gym->harga }}</p>
                        <p>Silakan lakukan pembayaran sesuai dengan instruksi yang diberikan.</p>
                    @endif
                </div>
              </div>
          </div>
      </div>
  </div>

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