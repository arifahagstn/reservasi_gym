@extends('template.master')

@section('content')
<h1 class="fw-semibold text-center py-3">
    Data Pelatih Gym
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
                <h3 class="card-title">Pelatih Gym</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('pelatih.store')}}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_pelatih">Nama</label>
                    <input type="text" name="nama_pelatih" id="nama_pelatih"  class="form-control" placeholder="Enter Nama Pelatih">
                  </div>
                  <div class="form-group">
                    <label for="telp">No Telpon</label>
                    <input type="number" name="telp" id="telp" class="form-control" placeholder="Enter No Telepeon">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="30" rows="10" class="form-control" placeholder="Enter Alamat Anda"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="pengalaman_kerja">Pengalaman Kerja</label>
                    <textarea name="pengalaman_kerja" id="pengalaman_kerja" cols="30" rows="10" class="form-control" placeholder="Enter Pengalaman Kerja Anda"></textarea>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection