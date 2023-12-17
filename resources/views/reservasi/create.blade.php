@extends('template.master')

@section('content')
    <h1 class="fw-semibold text-center py-3">Formulir Pemesanan Gym</h1>
    <div class="container">
        <form action="{{ route('reservasi.store') }}" method="POST" id="bookingForm">
            @csrf
            <input type="text" name="user_id" value="{{ Auth::user()->id }}" hidden>

            <div class="form-group">
                <label for="gym_id">Nama Gym</label>
                <select name="gym_id" id="gym_id" class="form-control" onchange="updateFormFields()">
                    <option disabled selected>--Pilih Salah Satu--</option>
                    @foreach ($gyms as $gym)
                        <option value="{{ $gym->id }}" data-pelatih="{{ $gym->pelatih->nama_pelatih }}" data-harga="{{ $gym->harga }}">
                            {{ $gym->nama_gym }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="pelatih_id">Nama Pelatih</label>
                <input type="text" id="pelatih" class="form-control" disabled>
                <input type="hidden" name="pelatih_id" id="pelatih_id">
            </div>

            <div class="form-group">
                <label for="date">Tanggal Pemesanan</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>

            <div class="form-group">
                <label for="time">Jam Pemesanan</label>
                <select type="text" name="time" class="form-control @error('time') is-invalid @enderror" value="{{ old('time') }}">
                    <option disabled selected>pilih jam pesan</option> 
                    <option value="08:00">08:00</option>
                    <option value="09:00">09:00</option>
                    <option value="10:00">10:00</option>
                    <option value="11:00">11:00</option>
                    <option value="12:00">12:00</option>
                    <option value="13:00">13:00</option>
                    <option value="14:00">14:00</option>
                    <option value="15:00">15:00</option>
                    <option value="16:00">16:00</option>
                    <option value="17:00">17:00</option>
                    <option value="18:00">18:00</option>
                    <option value="19:00">19:00</option>
                    <option value="20:00">20:00</option>
                    <option value="21:00">21:00</option>
                </select>
            </div>
            @error('time')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" class="form-control" readonly>
            </div>

            <div class="card-footer" style="background-color: white;">
                <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                <button type="reset" class="btn btn-sm alert-danger">Reset</button>
                <a href="{{ route('gym.index') }}" class="btn btn-sm btn-success">Kembali</a>
            </div>
        </form>
    </div>

    <script>
        function updateFormFields() {
            var gymSelect = document.getElementById('gym_id');
            var selectedOption = gymSelect.options[gymSelect.selectedIndex];
            var pelatihInput = document.getElementById('pelatih');
            var pelatihIdInput = document.getElementById('pelatih_id');
            var hargaInput = document.getElementById('harga');

            pelatihInput.value = selectedOption.getAttribute('data-pelatih');
            pelatihIdInput.value = selectedOption.value;
            hargaInput.value = selectedOption.getAttribute('data-harga');
        }
    </script>
@endsection
