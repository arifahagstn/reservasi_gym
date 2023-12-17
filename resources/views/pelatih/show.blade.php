@extends('template.master')

@section('content')
<h2 class="fw-semibold text-center py-3">
    Detail Data Pelatih
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
                <h3 class="card-title">Quick Example</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start --> 
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_pelatih">Nama Pelatih</label>
                    <input type="text" name="nama_pelatih" id="nama_pelatih"  class="form-control" value="{{$pelatih[0]->nama_pelatih}}" disabled>
                  </div> 
                  <div class="form-group">
                    <label for="telp">No Telepon</label>
                    <input type="number" name="telp" id="telp" class="form-control" value="{{$pelatih[0]->telp}}" disabled>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control"  disabled>{{$pelatih[0]->alamat}}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="pengalaman_kerja">Pengalaman Kerja</label>
                    <textarea name="pengalaman_kerja" id="pengalaman_kerja" cols="30" rows="10" class="form-control"  disabled>{{$pelatih[0]->pengalaman_kerja}}</textarea>
                  </div>
                  <div><a href="{{ route('pelatih.index') }}" class="btn btn-sm btn-primary">Back</a></div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection