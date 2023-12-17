@extends('template.master')

@section('content')
<h2 class="fw-semibold text-center py-3">
    Edit Data Jadwal
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
              <form action="{{ route('jadwal.update', $jadwal->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_gym">Nama Gym</label>
                        <select name="nama_gym" id="nama_gym"
                            class="form-control @error('nama_gym') is-invalid @enderror">
                            <option disabled selected>--Pilih Salah Satu--</option>
                            @forelse ($gym as $value)
                                <option value="{{ $value->id }}"
                                    {{ $value->id == $jadwal->gym_id ? 'selected' : '' }}>
                                    {{ $value->nama_gym }}
                                </option>
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
                        @forelse ($pelatih as $value)
                            <option value="{{ $value->id }}"
                                {{ $value->id == $jadwal->pelatih_id ? 'selected' : '' }}>
                                {{ $value->nama_pelatih }}
                            </option>
                        @empty
                            <option disabled>--Data Masih Kosong--</option>
                        @endforelse
                    </select>
                </div>
                @error('pelatih')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                    <div class="form-group">
                      <label for="senin">Senin</label>
                      <input type="text" name="senin" id="senin" class="form-control @error('senin') is-invalid @enderror" value="{{$jadwal->senin}}">
                    </div> 
                    @error('senin')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="selasa">Selasa</label>
                        <input type="text" name="selasa" id="selasa" class="form-control @error('selasa') is-invalid @enderror" value="{{$jadwal->selasa}}">
                      </div> 
                      @error('selasa')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                        <label for="rabu">Rabu</label>
                        <input type="text" name="rabu" id="rabu" class="form-control @error('rabu') is-invalid @enderror" value="{{$jadwal->rabu}}">
                      </div> 
                      @error('rabu')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                        <label for="kamis">Kamis</label>
                        <input type="text" name="kamis" id="kamis" class="form-control @error('kamis') is-invalid @enderror" value="{{$jadwal->kamis}}">
                      </div> 
                      @error('kamis')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                        <label for="jumat">Jumat</label>
                        <input type="text" name="jumat" id="jumat" class="form-control @error('jumat') is-invalid @enderror" value="{{$jadwal->jumat}}">
                      </div> 
                      @error('jumat')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                        <label for="sabtu">Sabtu</label>
                        <input type="text" name="sabtu" id="sabtu" class="form-control @error('sabtu') is-invalid @enderror" value="{{$jadwal->sabtu}}">
                      </div> 
                      @error('sabtu')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                      <div class="form-group">
                        <label for="minggu">Minggu</label>
                        <input type="text" name="minggu" id="minggu" class="form-control @error('minggu') is-invalid @enderror" value="{{$jadwal->minggu}}">
                      </div> 
                      @error('minggu')
                          <div class="alert alert-danger">{{ $message }}</div>
                      @enderror
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-warning">Update</button>
                    <a href="{{ route('jadwal.index', ['gym' => $jadwal->gym_id]) }}" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">Kembali</a>
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
              <p>Apakah Anda yakin akan keluar dari Form Edit Data Jadwal</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
              <a href="{{ route('jadwal.index', ['gym' => $jadwal->gym_id]) }}" class="btn btn-primary">Iya</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
@endsection