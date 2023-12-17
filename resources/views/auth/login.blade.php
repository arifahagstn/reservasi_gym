<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminLte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('adminLte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminLte/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box mx-auto">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <div class="row">
        <div class="col-1">
          <a href="{{ route('gym.index')}}">
            <img src="{{ asset('assets/icon/arrow.png') }}" alt="Back" style="width: 25px; height: 25px">
          </a>
        </div>
        <div class="col-10">
        <div class="h1">
          <span style="font-size: 1em;">The Gym</span><br>
          <b style="font-size: 0.8em;">Company</b>
        </div>
        </div>
      </div>
      </div>      
    <div class="card-body">
      <form action="{{ route('auth.authentication') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ @old('email') }}">
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
          <input type="password" class="form-control @error('email') is-invalid @enderror" placeholder="Password" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <div class="row">
          <div class="col-8">
          </div>
          <!-- /.col -->
        <div class="d-grid gap-2 col-12 mx-auto">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </div>
        <div class="text-center mt-3">
          <div class="mx-5" style="width: 85%;">
            <p class="mb-0">Belum punya akun? <a href="{{ route('auth.register') }}">Register</a></p>
          </div>
        </div>        
               
               
          <!-- /.col -->
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('AdminLte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLte/dist/js/adminlte.min.js') }}"></script>

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