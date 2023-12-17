@extends('template.master')

@section('content')
<h2 class="fw-semibold text-center py-3">
    Edit Data Pelatih
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
              <form action="{{ route('pelatih.update', $pelatih->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_pelatih">Nama Pelatih</label>
                    <input type="text" name="nama_pelatih" id="nama_pelatih" class="form-control @error('nama_pelatih') is-invalid @enderror" value="{{$pelatih->nama_pelatih}}">
                  </div>
                  @error('nama_pelatih')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="telp">Nomor Telepon</label>
                    <input type="number" name="telp" id="telp" class="form-control @error('telp') is-invalid @enderror" value="{{$pelatih->telp}}">
                  </div> 
                  @error('telp')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control @error('alamat') is-invalid @enderror">{{$pelatih->alamat }}</textarea>
                  </div>
                  @error('alamat')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  <div class="form-group">
                    <label for="pengalaman_kerja">Pengalaman Kerja</label>
                    <textarea name="pengalaman_kerja" id="pengalaman_kerja" cols="30" rows="10" class="form-control @error('pengalaman_kerja') is-invalid @enderror">{{$pelatih->pengalaman_kerja }}</textarea>
                  </div>
                  @error('pengalaman_kerja')
                      <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                  </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-sm btn-warning">Update</button>
                    <a href="{{ route('pelatih.index') }}" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">Kembali</a>
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
              <p>Apakah Anda yakin akan keluar dari Form Edit Data Pelatih</p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
              <a href="{{ route('pelatih.index') }}" class="btn btn-primary">Iya</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
@endsection