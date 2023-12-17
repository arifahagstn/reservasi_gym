@extends('template.master')

@section('content')
<h2 class="fw-semibold text-center py-3">Form Input Data Jadwal dan Pelatih Gym</h2>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card-body">
              <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Data Jadwal dan Pelatih Gym</h3>
              </div>
              <!-- /.card-header -->
      
<form action="{{ route('jadwal.store') }}" method="POST">
    @csrf
                        <!-- form start -->
                        <form>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_gym">Nama Gym</label>
                                    <select name="nama_gym" id="nama_gym"
                                        class="form-control @error('nama_gym') is-invalid @enderror">
                                        <option disabled selected>--Pilih Salah Satu--</option>
                                        @forelse ($gym as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->nama_gym }}</option>
                                        @empty
                                            <option disabled>--Data Masih Kosong--</option>
                                        @endforelse

                                    </select>
                                </div>
                                @error('nama_gym')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="pelatih">Pelatih</label>
                                    <select name="pelatih" id="pelatih"
                                        class="form-control @error('pelatih') is-invalid @enderror">
                                        <option disabled selected>--Pilih Salah Satu--</option>
                                        @forelse ($pelatih as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->nama_pelatih }}</option>
                                        @empty
                                            <option disabled>--Data Masih Kosong--</option>
                                        @endforelse
                                    </select>
                                </div>
                                @error('pelatih')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                        <div class="form-group">
                                            <label for="exampleInputSenin">Senin</label>
                                            <input type="text" class="form-control @error('senin') is-invalid @enderror"
                                                name="senin">
                                        </div>
                                        @error('senin')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleInputSelasa">Selasa</label>
                                            <input type="text" class="form-control @error('selasa') is-invalid @enderror"
                                                name="selasa">
                                        </div>
                                        @error('selasa')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleInputRabu">Rabu</label>
                                            <input type="text" class="form-control @error('rabu') is-invalid @enderror"
                                                name="rabu">
                                        </div>
                                        @error('rabu')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleInputKamis">Kamis</label>
                                            <input type="text" class="form-control @error('kamis') is-invalid @enderror"
                                                name="kamis">
                                        </div>
                                        @error('kamis')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleInputJumat">Jumat</label>
                                            <input type="text" class="form-control @error('jumat') is-invalid @enderror"
                                                name="jumat">
                                        </div>
                                        @error('jumat')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleInputSabtu">Sabtu</label>
                                            <input type="text" class="form-control @error('sabtu') is-invalid @enderror"
                                                name="sabtu">
                                        </div>
                                        @error('sabtu')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        <div class="form-group">
                                            <label for="exampleInputMinggu">Minggu</label>
                                            <input type="text" class="form-control @error('minggu') is-invalid @enderror"
                                                name="minggu">
                                        </div>
                                        @error('minggu')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                                            <a href="{{ route('gym.show',  $gym[0]->id) }}" class="btn btn-sm btn-success">Kembali</a>
                                          </div>
                        </form>
                    </div>
                </div>
                <!-- jQuery -->
                <script src="{{ asset('adminLte/plugins/jquery/jquery.min.js') }}"></script>
                <!-- Bootstrap 4 -->
                <script src="{{ asset('adminLte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
                <!-- AdminLTE App -->
                <script src="{{ asset('adminLte/dist/js/adminlte.min.js') }}"></script>

                
            @endsection