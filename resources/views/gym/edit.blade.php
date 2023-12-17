@extends('template.master')

@section('content')
    <h2 class="fw-semibold text-center py-3">
        Edit Data Gym
    </h2>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        {{-- {{dd($gym)}} --}}
                        <form action="{{ route('gym.update', $gym->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama_gym">Nama Gym</label>
                                    <input type="text" name="nama_gym" id="nama_gym"
                                        class="form-control @error('nama_gym') is-invalid @enderror"
                                        value="{{ $gym->nama_gym }}">
                                </div>
                                @error('nama_gym')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group d-flex flex-column">
                                    <label for="poster">Poster</label>
                                    {{-- <input type="file" name="poster" id="poster"
                                        class="form-control @error('poster') is-invalid @enderror"> --}}
                                    @if ($gym->poster)
                                    <img src="{{ asset($gym->poster) }}" alt="Gym Poster" style="max-width: 200px; margin-top: 10px;">
                                    @endif
                                </div>
                                @error('poster')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="pelatih_id">Pilih Pelatih</label>
                                    <select name="pelatih_id" id="pelatih_id" class="form-control">
                                        @foreach ($pelatihs as $pelatih)
                                            <option value="{{ $pelatih->id }}"
                                                {{ $gym->pelatih_id == $pelatih->id ? 'selected' : '' }}>
                                                {{ $pelatih->nama_pelatih }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="telp">Nomor Telepon</label>
                                    <input type="number" name="telp" id="telp"
                                        class="form-control @error('telp') is-invalid @enderror"
                                        value="{{ $gym->telp }}">
                                </div>
                                @error('telp')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                  <label for="paket">Jenis Paket</label>
                                  <input type="text" name="paket" id="paket" class="form-control @error('paket') is-invalid @enderror" value="{{$gym->paket}}">
                              </div>
                              @error('paket')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                  <label for="harga">Harga</label>
                                  <select type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ $gym->harga }}">
                                    <option disabled selected>Harga</option>
                                    <option value="50000">50000</option>
                                    <option value="100000">100000</option>
                                  </select>
                                </div>
                                  @error('harga')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                  <label for="jam_operational">Jam Operational</label>
                                  <select type="text" name="jam_operational" class="form-control @error('jam_operational') is-invalid @enderror" value="{{ $gym->jam_operational }}">
                                    <option disabled selected>Jam Operational</option>
                                    <option value="07.00 - 22.00">07.00 - 22.00</option>
                                  </select>
                                </div>
                                  @error('jam_operational')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                <div class="form-group">
                                  <div class="row">
                                      <div class="col">
                                        <span style="font-weight: bold;">Rating :</span>
                                         @if ($gym->point == 20)
                                      <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1 ml-2">
                                      <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      @elseif ($gym->point == 40)
                                      <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1 ml-2">
                                      <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      @elseif ($gym->point == 60)
                                      <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1 ml-2">
                                      <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      @elseif ($gym->point == 80)
                                      <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1 ml-2">
                                      <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      @elseif ($gym->point == 100)
                                      <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1 ml-2">
                                      <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
                                      @endif
                                    </p>
                                  </div>
                                </div>
                                </div>
                                <div class="form-group">
                                  <label for="alamat">Alamat</label>
                                  <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control @error('alamat') is-invalid @enderror">{{$gym->alamat }}</textarea>
                                </div>
                                @error('alamat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                  <label for="deskripsi">Deskripsi</label>
                                  <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control  @error('deskripsi') is-invalid @enderror">{{$gym->deskripsi }}</textarea>
                                </div>
                                @error('deskripsi')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                                <!-- Tambahkan input dan validasi lainnya sesuai kebutuhan Anda -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                <a href="{{ route('gym.index') }}" class="btn btn-sm btn-success"
                                    data-toggle="modal" data-target="#exampleModal">Kembali</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.container-fluid -->
                <div class="modal" tabindex="-1" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Peringatan</h5>
                            </div>
                            <div class="modal-body">
                                <p>Apakah Anda yakin akan keluar dari Form Edit Data Gym</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                <a href="{{ route('gym.index') }}" class="btn btn-primary">Iya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
