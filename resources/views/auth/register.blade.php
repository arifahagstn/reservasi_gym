<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registration</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminLte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminLte/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
        <div class="h1">
          <span style="font-size: 1em;">The Gym</span><br>
          <b style="font-size: 0.8em;">Company</b>
        </div>
      </div> 
    <div class="card-body">
      <form action="{{ route('auth.store') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" placeholder="Full name" value="{{ @old('enama') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ @old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="input-group mb-3">
          <input type="password" name="confirm" class="form-control" placeholder="Retype password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('confirm')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
          <!-- /.col -->
          <div class="d-grid gap-2 col-12 mx-auto">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
        <a href="{{ route('auth.login') }}" class="text-center mt-0 mb-3">Sudah Punya Akun?</a>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('adminLte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminLte/dist/js/adminlte.min.js') }}"></script>

<style>
    body {
      background-image: url('assets/img/gym5.jpeg'); /* Ganti 'path/to/your/image.jpg' dengan path gambar Anda */
      background-size: cover; /* Untuk menyesuaikan ukuran gambar sesuai layar */
      background-position: center; /* Untuk menentukan posisi gambar */
      background-repeat: no-repeat; /* Untuk menghindari pengulangan gambar */
    }
  </style>
</head>
<body class="hold-transition register-page">

</body>
</html>