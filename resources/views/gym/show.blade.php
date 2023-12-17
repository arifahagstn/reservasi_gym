@extends('template.master')

@section('content')

<div class="card">
  <div class="card-header d-flex justify-content-end" style="background-color: white;">
    <a href="{{ route('jadwal.index', $gym[0]->id) }}" class="btn btn-sm btn-primary">
      Lihat Jadwal untuk Membooking
    </a>
  </div>

  <div class="card-body">
    <div class="row">
      <div class="col-12 col-sm-6 mt-4">
        <div class="col-12">
            <img src="{{ $gym[0]->poster }}" style="width: 100%; height: auto;">
        </div>
    </div>
    
      <div class="col-12 col-sm-6">
        <h2 class="my-3">{{  $gym[0]->nama_gym}}</h2>
        <th><strong>Alamat :</strong></th>
        <a href="https://www.google.com/maps/search/{{ urlencode($gym[0]->alamat) }}" target="_blank">
        <p>{{ $gym[0]->alamat}}
        </a>
        </p>
        <th><strong>No Telepon :</strong></th>
        <p>{{ $gym[0]->telp}}</p>
        <th><strong>Jam Buka :</strong></th>
        <p>{{ $gym[0]->jam_operational}}</p>
        <th><strong>Jenis Paket :</strong></th>
        <p>{{ $gym[0]->paket}}</p>
        <th><strong>Nama Pelatih :</strong></th>
        <p>{{ $gym[0]->nama_pelatih}}</p>
        <th><strong>Harga :</strong></th>
        <p>{{ $gym[0]->harga}}</p>
        <th><strong>Deskripsi :</strong></th>
        <p>{{ $gym[0]->deskripsi}}</p>
    </div>

      <div>
        Rating : @if ($gym[0]->point == 20)
        <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1 ml-2">
        <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
        <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
        <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
        <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
        @elseif ($gym[0]->point == 40)
        <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1 ml-2">
        <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
        <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
        <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
        <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
        @elseif ($gym[0]->point == 60)
        <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1 ml-2">
        <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
        <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
        <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
        <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
        @elseif ($gym[0]->point == 80)
        <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1 ml-2">
        <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
        <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
        <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
        <img src="{{asset('assets/img/star_ori.png')}}" alt="..." style="width: 20px" class="mb-1">
        @elseif ($gym[0]->point == 100)
        <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1 ml-2">
        <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
        <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
        <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
        <img src="{{asset('assets/img/star_yellow.png')}}" alt="..." style="width: 20px" class="mb-1">
        @endif
      </p>

      @empty($gym[0])
      Belum ada rating
      @endempty
    </div>
  </div>
</div>
<!-- /.card-body -->
<div class="card-footer" style="background-color: white;">
  <a href="{{ route('gym.index') }}" class="btn btn-sm btn-success">
  Kembali
  </a>
</div>
</div>

@endsection