@extends('template.master')

@section('title', 'Profile')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Profile</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Profile</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <!-- Default box -->
        <div class="card">
          <div class="card-body row">
            <div class="col-5 text-center d-flex align-items-center justify-content-center">
              <div class="">
                <h2>Admin<strong>LTE</strong></h2>
                <p class="lead mb-5">123 Testing Ave, Testtown, 9876 NA<br>
                  Phone: +1 234 56789012
                </p>
              </div>
            </div>
            <div class="col-7">
              <div class="form-group">
                <label for="inputName">Name</label>
                <input type="text" id="inputName" class="form-control" value="{{ Auth::user()->name }}" />
              </div>
              <div class="form-group">
                <label for="inputEmail">E-Mail</label>
                <input type="email" id="inputEmail" class="form-control" value="{{ Auth::user()->email }}"/>
              </div>
              <div class="form-group">
                <label for="inputSubject">Umur</label>
                <input type="text" id="inputSubject" class="form-control" value="{{ $profiles[0]->umur }}"/>
                {{-- {{ dd($profiles[0]->umur) }} --}}
              </div>
              <div class="form-group">
                <label for="inputMessage">Bio</label>
                <textarea id="inputMessage" class="form-control" rows="3">{{ $profiles[0]->bio }}</textarea>
              </div>
              <div class="form-group">
                <label for="inputMessage">Alamat</label>
                <textarea id="inputMessage" class="form-control" rows="3">{{ $profiles[0]->alamat }}</textarea>
              </div>
              <div class="form-group">
                <a href="{{ route('auth.dashboard') }}" class="btn btn-primary">Back</a></div>
              </div>
            </div>
          </div>
        </div>

    </section>
</div>
@endsection