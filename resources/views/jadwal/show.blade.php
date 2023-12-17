@extends('template.master')

@section('content')
    <div class="container">
        <h1 class="fw-semibold text-center py-3">Detail Jadwal</h1>

        <div class="card">
            <div class="card-body">
                {{-- <h5 class="card-title">Detail Jadwal</h5> --}}
                <ul class="list-group">
                    <li class="list-group-item"><strong>Nama Gym:</strong> {{ $gyms->nama_gym }}</li>
                    <li class="list-group-item"><strong>Nama Pelatih:</strong> {{ $pelatihs->nama_pelatih }}</li>
                    <li class="list-group-item"><strong>Senin:</strong> {{ $jadwal->senin }}</li>
                    <li class="list-group-item"><strong>Selasa:</strong> {{ $jadwal->selasa }}</li>
                    <li class="list-group-item"><strong>Rabu:</strong> {{ $jadwal->rabu }}</li>
                    <li class="list-group-item"><strong>Kamis:</strong> {{ $jadwal->kamis }}</li>
                    <li class="list-group-item"><strong>Jumat:</strong> {{ $jadwal->jumat }}</li>
                    <li class="list-group-item"><strong>Sabtu:</strong> {{ $jadwal->sabtu }}</li>
                    <li class="list-group-item"><strong>Minggu:</strong> {{ $jadwal->minggu }}</li>
                </ul>
                <div class="card-footer" style="background-color: white;">
                  <a href="" class="btn btn-sm btn-secondary" data-toggle="modal"
                  data-target="#exampleModal">Kembali</a>
              </div>
      </form>
  </div>
</div>

<div class="modal" tabindex="-1" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Peringatan</h5>
          </div>
          <div class="modal-body">
              <p>Apakah Anda Yakin Akan Keluar Dari Form Show Data Pengembalian</p>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <a href="{{ route('jadwal.index') }}" class="btn btn-primary">Yes</a>
          </div>
      </div>
  </div>
</div>
@endsection