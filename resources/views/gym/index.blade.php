@extends('template.master')

@section('content')

<body>

  @can('isAdmin')
  <div class="card card-success">
      <div class="card-body">
        <a href="{{ route('gym.create') }}" class="btn btn-sm btn-primary float-right">
          <i class="fas fa-plus"></i> Tambah Tempat Gym
        </a>
          <div class="row">
              @foreach ($gyms as $gym)
              <div class="col-md-12 col-lg-6 col-xl-4">
                  <div class="card mb-2">
                      <img class="card-img-top" src="{{ $gym->poster }}" alt="{{ $gym->nama_gym }}">
                      <div class="card-body">
                          <a href="{{ route('gym.show', $gym->id) }}" class="card-title text-dark">{{ $gym->nama_gym }}</a>
                      </div>
                      <div class="card-footer">
                          <div class="d-flex justify-content-between">
                              <a href="{{ route('gym.edit', $gym->id) }}" class="btn btn-sm btn-warning">
                                  <i class="nav-icon fas fa-pen"></i> Edit Data
                              </a>
                              <form action="{{ route('gym.destroy', $gym->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i></button>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </div>
    @elsecan('isUser')
        <div class="container text-center" style="position: relative; padding: 0px; margin-bottom: 50px">
            <h1 style="color: #ffffff; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">Welcome, {{ Auth::user()->name }}!</h1>
            <img src="{{ asset('assets/img/gym8.png') }}" alt="User Image" style="width: 1000px; max-height: 500px;" class="mx-auto d-block">
        </div>
        <section id="about_us" class="pb-5">
          <div class="container">
              <div class="row">
                  <div class="col-md-6 col-sm-5 d-flex justify-content-center flex-column">
                      <div class="row">
                          <div class="col">
                              <h2 class="fw-bold" style="font-size: 20px; color: #000000; font-family: 'poppins'; margin-left: 100px;">GET INSPIRED.</h2>
                              <h2 class="fw-bold mb-6" style="font-size: 20px; color: #000000; font-family: 'poppins'; margin-left: 100px;">AND GO TO TAKE A CHANCE.</h2>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col">
                            <h6 class="fw-semibold ps-3" style="font-size: 15px; color: #000000; margin-left: 100px;">Here is what you can expect when you join us today:</h6>
                        </div>
                    </div>
                      <div class="row">
                        <div class="col pt-0 mt-0 d-flex">
                          <img src="assets/icon/Dumbbell.png" alt="..." class="img-fluid pt-2" style="width: 30px; height: 35px; margin-left: 100px;">
                          <p class="fs-3 ps-2 pt-0" style="color: #000000; font-family: 'poppins'; margin-left: 20px;">Premium workout at three state-of-the-art gym clubs nationwide.</p>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col pt-0 mt-0 d-flex">
                          <img src="assets/icon/PT.png" alt="..." class="img-fluid pt-2" style="width: 30px; height: 35px; margin-left: 100px;">
                          <p class="fs-3 ps-2 pt-2" style="color: #000000; font-family: 'poppins'; margin-left: 20px;">Trainers who are certified and trusted.</p>
                        </div>
                      </div>
                  </div>
                  <div class="col-md-6 col-sm-5 d-flex justify-content-center">
                      <img src="{{ asset('assets/img/gym7.jpeg') }}" alt="..." style="width: 400px; max-height: 3000px;" class="img-fluid">
                  </div>
              </div>
          </div>
      </section>
      <section id="about_us" class="pb-5">
        <div class="pb-3">
        <h5 class="mb-2" style="font-size: 20px; color: #000000; margin-left: 400px; font-family: 'poppins';">GYM CLUBS AT THREE LOCATIONS</h5>
        <h5 class="mb-2" style="font-size: 15px; color: #000000; margin-left: 150px; font-family: 'poppins';">Workout in a gym that's equipped with premium strength, cardio, and functional fitness equipment from Technogym,</h5>
        <h5 class="mb-2" style="font-size: 15px; color: #000000; margin-left: 400px; font-family: 'poppins';">Life Fitness, and Rogue.</h5>
        </div>
        <div class="card card-success">
          <div class="card-body">
            <div class="row">
              @foreach ($gyms as $gym)
              <div class="col-md-12 col-lg-6 col-xl-4">
                <div class="card mb-2">
                    <a href="{{ route('gym.show', $gym->id) }}">
                        <img class="card-img" src="{{ $gym->poster }}" alt="{{ $gym->nama_gym }}">
                    </a>
                    <div class="card-body">
                        <a href="{{ route('gym.show', $gym->id) }}" class="card-title text-dark mt-2">{{ $gym->nama_gym }}</a>
                    </div>
                </div>
            </div>
              @endforeach
            </div>
          </div>
          <div class="col">
            <p class="fw-bold" style="font-size: 15px; color: grey; font-family: 'poppins'; margin-left: 10px;">* tap the image to see available gym details and schedules</p>
          </div>
        </div>
      </section>
    @endcan

  @guest
    <div class="container text-center" style="position: relative; padding: 0px; margin-bottom: 50px">
      <h1 style="color: #ffffff; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 2;">Welcome, Sobat Sehat!</h1>
      <img src="{{ asset('assets/img/gym8.png') }}" alt="User Image" style="width: 1000px; max-height: 500px;" class="mx-auto d-block">
      <p style="position: absolute; bottom: 0; width: 100%; background-color: rgba(0, 0, 0, 0.5); color: #ffffff; padding: 10px;">Untuk melihat dan melakukan reservasi, silakan <a href="{{ route('auth.login') }}" style="color: #ffffff;">login</a> atau <a href="{{ route('auth.register') }}" style="color: #ffffff;">daftar</a>.</p>
    </div>
    <section id="about_us" class="pb-5">
      <div class="container">
          <div class="row">
              <div class="col-md-6 col-sm-5 d-flex justify-content-center flex-column">
                  <div class="row">
                      <div class="col">
                          <h2 class="fw-bold" style="font-size: 20px; color: #000000; font-family: 'poppins'; margin-left: 100px;">GET INSPIRED.</h2>
                          <h2 class="fw-bold mb-6" style="font-size: 20px; color: #000000; font-family: 'poppins'; margin-left: 100px;">AND GO TO TAKE A CHANCE.</h2>
                      </div>
                  </div>
                  <div class="row">
                    <div class="col">
                        <h6 class="fw-semibold ps-3" style="font-size: 15px; color: #000000; margin-left: 100px;">Here is what you can expect when you join us today:</h6>
                    </div>
                </div>
                  <div class="row">
                    <div class="col pt-0 mt-0 d-flex">
                      <img src="assets/icon/Dumbbell.png" alt="..." class="img-fluid pt-2" style="width: 30px; height: 35px; margin-left: 100px;">
                      <p class="fs-3 ps-2 pt-0" style="color: #000000; font-family: 'poppins'; margin-left: 20px;">Premium workout at three state-of-the-art gym clubs nationwide.</p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col pt-0 mt-0 d-flex">
                      <img src="assets/icon/PT.png" alt="..." class="img-fluid pt-2" style="width: 30px; height: 35px; margin-left: 100px;">
                      <p class="fs-3 ps-2 pt-2" style="color: #000000; font-family: 'poppins'; margin-left: 20px;">Trainers who are certified and trusted.</p>
                    </div>
                  </div>
              </div>
              <div class="col-md-6 col-sm-5 d-flex justify-content-center">
                  <img src="{{ asset('assets/img/gym7.jpeg') }}" alt="..." style="width: 400px; max-height: 3000px;" class="img-fluid">
              </div>
          </div>
      </div>
  </section>
  @endguest

</body>

@endsection
