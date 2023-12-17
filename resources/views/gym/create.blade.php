@extends('template.master')

@section('content')
<h1 class="fw-semibold text-center py-3">
    Data Tempat Gym
  </h1>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Form Tempat Gym</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('gym.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_gym">Nama Gym</label>
                    <input type="text" name="nama_gym" id="nama_gym" class="form-control @error('nama_gym') is-invalid @enderror" placeholder="Enter Nama Gym Anda" value="{{ old('nama_gym') }}">
                </div>
                    @error('nama_gym')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                      <label for="poster">Poster</label>
                      <input type="file" name="poster" id="poster" class="form-control @error('poster') is-invalid @enderror" placeholder="Masukan Gambar Gym Anda" value="{{ old('poster') }}">
                    </div>
                    @error('poster')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                      <label for="pelatih_id">Pilih Pelatih</label>
                      <select name="pelatih_id" id="pelatih_id" class="form-control">
                          @foreach ($pelatihs as $pelatih)
                              <option value="{{ $pelatih->id }}">{{ $pelatih->nama_pelatih }}</option>
                          @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                      <label for="telp">No Telepon Gym</label>
                      <input type="text" name="telp" id="telp" class="form-control @error('telp') is-invalid @enderror" placeholder="Enter Nomor Telepon Gym Anda" value="{{ old('telp') }}">
                  </div>
                    @error('telp')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  <div class="form-group">
                    <label for="paket">Jenis Paket</label>
                    <input type="text" name="paket" id="paket" class="form-control @error('paket') is-invalid @enderror" placeholder="Enter Paket yang Tersedia di Gym Anda" value="{{ old('paket') }}">
                </div>
                    @error('paket')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                      <label for="harga">Harga</label>
                      <select type="text" name="harga" class="form-control @error('harga') is-invalid @enderror" value="{{ old('harga') }}">
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
                    <select type="text" name="jam_operational" class="form-control @error('jam_operational') is-invalid @enderror" value="{{ old('jam_operational') }}">
                      <option disabled selected>Jam Operational</option>
                      <option value="07.00 - 22.00">07.00 - 22.00</option>
                    </select>
                  </div>
                    @error('jam_operational')
                          <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                <div class="form-group">
                    <label for="point">Rating</label>
                    <input type="number" name="point" id="point" class="form-control @error('point') is-invalid @enderror" placeholder="Beri rating" hidden>
                    <div class="row">
                      <div class="col">
                        <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" id="star-1" onclick="star1()">
                        <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" id="star-2" onclick="star2()">
                        <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" id="star-3" onclick="star3()">
                        <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" id="star-4" onclick="star4()">
                        <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" id="star-5" onclick="star5()">
                      </div>
                    </div>
                </div>
                    @error('point')
                    <div class="alert alert-danger">{{$message}}</div>
                    @enderror
                <div class="form-group">
                      <label for="alamat">Alamat</label>
                      <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control  @error('alamat') is-invalid @enderror" placeholder="Enter Alamat Gym Anda" value="{{ old('alamat') }}"></textarea>
                    </div>
                    @error('alamat')
                              <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                      <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" class="form-control  @error('deskripsi') is-invalid @enderror" placeholder="Enter Deskripsi Gym Anda" value="{{ old('deskripsi') }}"></textarea>
                      </div>
                      @error('deskripsi')
                                <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                  <a href="{{ route('gym.index') }}" class="btn btn-sm btn-success">Kembali</a>
                </div>
              </form>
            </div>
            <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
    let star_1 = document.getElementById('star-1')
    let star_2 = document.getElementById('star-2')
    let star_3 = document.getElementById('star-3')
    let star_4 = document.getElementById('star-4')
    let star_5 = document.getElementById('star-5')
    let point = document.getElementById('point')
  
    star1 = () => {
      if(star_1.src = "{{ asset('assets/img/star_ori.png') }}") {
        star_1.src = "{{ asset('assets/img/star_yellow.png') }}"
        star_2.src = "{{ asset('assets/img/star_ori.png') }}"
        star_3.src = "{{ asset('assets/img/star_ori.png') }}"
        star_4.src = "{{ asset('assets/img/star_ori.png') }}"
        star_5.src = "{{ asset('assets/img/star_ori.png') }}"
        point.value = 20
      }
    }
    
    star2 = () => {
      if(star_2.src = "{{ asset('assets/img/star_ori.png') }}") {
        star_1.src = "{{ asset('assets/img/star_yellow.png') }}"
        star_2.src = "{{ asset('assets/img/star_yellow.png') }}"
        star_3.src = "{{ asset('assets/img/star_ori.png') }}"
        star_4.src = "{{ asset('assets/img/star_ori.png') }}"
        star_5.src = "{{ asset('assets/img/star_ori.png') }}"
        point.value = 40
      }
    }
    
    star3 = () => {
      if(star_3.src = "{{ asset('assets/img/star_ori.png') }}") {
        star_1.src = "{{ asset('assets/img/star_yellow.png') }}"
        star_2.src = "{{ asset('assets/img/star_yellow.png') }}"
        star_3.src = "{{ asset('assets/img/star_yellow.png') }}"
        star_4.src = "{{ asset('assets/img/star_ori.png') }}"
        star_5.src = "{{ asset('assets/img/star_ori.png') }}"
        point.value = 60
      }
    }
    
    star4 = () => {
      if(star_4.src = "{{ asset('assets/img/star_ori.png') }}") {
        star_1.src = "{{ asset('assets/img/star_yellow.png') }}"
        star_2.src = "{{ asset('assets/img/star_yellow.png') }}"
        star_3.src = "{{ asset('assets/img/star_yellow.png') }}"
        star_4.src = "{{ asset('assets/img/star_yellow.png') }}"
        star_5.src = "{{ asset('assets/img/star_ori.png') }}"
        point.value = 80
      }
    }
  
    star5 = () => {
      if(star_5.src = "{{ asset('assets/img/star_ori.png') }}") {
        star_1.src = "{{ asset('assets/img/star_yellow.png') }}"
        star_2.src = "{{ asset('assets/img/star_yellow.png') }}"
        star_3.src = "{{ asset('assets/img/star_yellow.png') }}"
        star_4.src = "{{ asset('assets/img/star_yellow.png') }}"
        star_5.src = "{{ asset('assets/img/star_yellow.png') }}"
        point.value = 100
      }
    }
  </script>
@endsection