@extends('template.master')

@section('content')
<h2 class="fw-semibold text-center py-3">
    Detail Data Reservasi
</h2>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form method="post" action="{{ route('reservasi.update', $reservasi->id) }}">
                        @csrf
                        @method('PUT') <!-- Add this line for update method -->

                        <div class="card-body">
                            <!-- ... (form fields) ... -->
                            {{-- <div class="card-body">
                              <div class="form-group">
                                <label for="gym_id">Nama Pelatih</label>
                                <input type="text" id="gym_id" class="form-control" value="{{ $gyms[0]->nama_gym}}" disabled>
                                <input type="hidden" name="gym_id" value="{{ $gyms[0]->id}}">
                              </div>
                              <div class="form-group">
                                <label for="pelatih_id">Nama Pelatih</label>
                                <input type="text" name="pelatih_id" id="pelatih_id" class="form-control" value="{{ $gyms[0]->pelatih->nama_pelatih}}" hidden>
                                <input type="hidden" name="pelatih_id" value="{{ $gyms[0]->pelatih->id}}">
                              </div>
                            <div class="form-group">
                                <label for="date">Tanggal Pemesanan</label>
                                <input type="text" name="date" id="date" class="form-control"
                                    value="{{ $reservasi ? $reservasi->tanggal_reservasi : '' }}" hidden>
                            </div>
                            <div class="form-group">
                                <label for="time">Jam Pemesanan</label>
                                <input type="text" name="time" id="time" class="form-control"
                                    value="{{ $reservasi ? $reservasi->jam_reservasi : '' }}" hidden>
                            </div> --}}

                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" name="status" id="status">
                                    <option disabled>Pilih Status Pengguna</option>
                                    <option value="Pending" {{ $reservasi && $reservasi->status == 'Pending' ? 'selected' : '' }}>
                                        Pending
                                    </option>
                                    <option value="Sudah Masuk"
                                        {{ $reservasi && $reservasi->status == 'Sudah Masuk' ? 'selected' : '' }}>
                                        Sudah Masuk
                                    </option>
                                </select>
                            </div>

                            <!-- ... (form fields) ... -->

                            <div>
                                <button type="submit" class="btn btn-sm btn-warning">Update</button>
                                <a href="{{ route('reservasi.index') }}" class="btn btn-sm btn-primary">Back</a>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                    <!-- Close the form tag here -->
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </div>
    </div>
</section>
<!-- /.content -->
@endsection
