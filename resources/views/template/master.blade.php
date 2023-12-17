<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GYM</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminLte/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminLte/dist/css/adminlte.min.css')}}">
  @stack('css')
</head>
<body class="hold-transition sidebar-mini">
  {{-- <div class="wrapper">
    <!-- Navbar -->
    @include('template.seperate.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('template.seperate.sidebar')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <section class="content">
        <!-- Default box -->
        @yield('content')
      <!-- /.card -->
      </section>
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    @include('template.seperate.footer')
    <!-- /footer -->

    <!-- Control Sidebar -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->
  </div> --}}
  <div class="wrapper">
    <!-- Navbar -->
    @include('template.seperate.navbar')
    <!-- /.navbar -->
  
    <!-- Main Sidebar Container -->
    @include('template.seperate.sidebar')
  
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @include('template.seperate.content')
    </div>
    <!-- /.content-wrapper -->
  
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
      <div class="p-3">
        <h5>Title</h5>
        <p>Sidebar content</p>
      </div>
    </aside>
    <!-- /.control-sidebar -->
  
    <!-- Main Footer -->
    {{-- <footer class="main-footer"> --}}
      <!-- To the right -->
      {{-- <div class="float-right d-none d-sm-inline">
        Anything you want
      </div> --}}
      <!-- Default to the left -->
      {{-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
    </footer> --}}
  </div>
  <!-- /.control-sidebar -->
<!-- ./wrapper -->
<!-- jQuery -->
<script src="{{ asset('adminLte/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminLte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
{{-- <script src="../../dist/js/demo.js"></script> --}}
@stack('script')
</body>
</html>
