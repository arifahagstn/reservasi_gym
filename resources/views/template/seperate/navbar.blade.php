<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="{{ route('gym.index') }}" class="nav-link" style="color:black">Home</a>
    </li>
    @can('isUser')
    <li class="nav-item d-none d-sm-inline-block">
      <a href="gym" class="nav-link" style="color: black">About Us</a>
    </li>
    @endcan
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    @if (Auth::check())
    <li class="nav-item">
    <a href="{{ route('auth.logout') }}" class="nav-link" style="background-color:black; border-radius:30px; color:aliceblue">Logout</a>
    @else
    <a href="{{ route('auth.login') }}" class="nav-link" style="color:black">Login</a>
    <br>
    <a href="{{ route('auth.register') }}" class="nav-link" style="background-color:black; border-radius:30px; color:aliceblue">Register</a>
    @endif
  </ul>
</nav>
