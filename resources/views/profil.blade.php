@extends('layouts.frontend')

@section('title', 'Halaman Profil')

@section('content')


    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-img bg-overlay jarallax"
        style="background-image: url({{ asset('frontend') }}/img/bg-img/17.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Profile</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="roberto-news-area section-padding-100-0" style="padding-bottom: 200px">
        <div class="container">
            <h3>Form Ubah Data Profil</h3>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mt-3">

                            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Tamu</label>
                                    <input type="name" name="name" class="form-control" placeholder="Nama Tamu" value="{{ Auth::user()->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="" disabled value="{{ Auth::user()->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nomor Hp</label>
                                    <input type="number" name="no_hp" class="form-control" placeholder="Nomor HP" value="{{ Auth::user()->no_hp }}">
                                </div>
                                <button type="submit" class="btn btn-success btn-sm">Simpan Data</button>
                            </form>
                        </div>

                        <div class="col-6 mt-3">
                            <form action="{{ route('update.password.profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password Lama</label>
                                    <input type="password" name="oldPassword" class="form-control" placeholder="Password Lama" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password Baru</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password Baru" required>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Konfirmasi Password Baru</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Password Baru" required>
                                </div>
                                <button type="submit" class="btn btn-success btn-sm">Update Password</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

@endsection
