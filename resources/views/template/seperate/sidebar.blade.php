<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('assets/img/gym.jpg') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">TGC</span>
    </a>
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          {{-- <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image"> --}}
        </div>
        <div class="info">
          @if (Auth::check())
            <a href="{{ route('auth.profile') }}" class="d-block">{{ Auth::user()->name }}</a>
          @endif
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          @can('isAdmin')
              <li class="nav-item">
                <a href="{{ asset('pelatih') }}" class="nav-link
                @if (Request::segment(1) == 'pelatih') active @endif">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                    Pelatih
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('gym') }}" class="nav-link
                @if (Request::segment(1) == 'gym') active @endif">
                <i class="nav-icon fas fa-dumbbell"></i>
                  <p>
                    Gym
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ asset('/jadwal/gym/index') }}" class="nav-link
                  @if (Request::segment(1) == 'jadwal') active @endif">
                  <i class="nav-icon fas fa-calendar"></i>
                  <p>
                    Jadwal
                  </p>
                </a>
              </li>
          @endcan
              <li class="nav-item">
                <a href="{{ asset('reservasi/gym/index') }}" class="nav-link
                @if (Request::segment(1) == 'reservasi') active @endif">
                  <i class="fa fa-archive nav-icon"></i>
                  <p>Data Reservasi</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
  