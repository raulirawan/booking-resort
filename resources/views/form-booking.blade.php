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
                        <h2 class="page-title">Form Booking</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Form Booking</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="roberto-news-area section-padding-100-0" style="padding-bottom: 200px">
        <div class="container">
            <h3>Form Data Booking</h3>
            <form  method="POST" action="{{ route('booking.form.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="kamar_id" value="{{ $kamar_id }}">
            <input type="hidden" name="tanggal_check_in" value="{{ $from }}">
            <input type="hidden" name="tanggal_check_out" value="{{ $to }}">
            <input type="hidden" name="adult" value="{{ $adult }}">
            <input type="hidden" name="children" value="{{ $children }}">
            <input type="hidden" name="jumlah_kamar" value="{{ $total_kamar }}">
            <input type="hidden" name="total_harga" value="{{ $total_harga }}">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 col-12 mt-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tanggal Check In</label>
                                    <input type="date" name="tanggal_check_in" class="form-control" value="{{ $from }}" disabled>
                                </div>
                        </div>
                        <div class="col-md-6 col-12 mt-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Check Out</label>
                                <input type="date" name="tanggal_check_out" class="form-control" value="{{ $to }}" disabled>
                            </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12 mt-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Tamu</label>
                                    <input type="text" name="nama_tamu" class="form-control" value="{{ Auth::user()->name }}" disabled>
                                </div>
                        </div>
                        <div class="col-md-6 col-12 mt-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="text" class="form-control" value="{{ Auth::user()->email }}" disabled>
                            </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12 mt-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Kamar</label>
                                    <input type="text"  class="form-control" value="{{ $kamar->nama_kamar }}" disabled>
                                </div>
                        </div>
                        <div class="col-md-6 col-12 mt-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tipe Kamar</label>
                                <input type="text" class="form-control" value="{{ $kamar->tipe_kamar }}" disabled>
                            </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12 mt-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jenis Bed</label>
                                    <input type="text"  class="form-control" value="{{ $kamar->jenis_bed }}" disabled>
                                </div>
                        </div>
                        <div class="col-md-6 col-12 mt-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Luas Kamar</label>
                                <input type="text" class="form-control" value="{{ $kamar->luas }} ft" disabled>
                            </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12 mt-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Dewasa</label>
                                    <input type="text" name="adult"  class="form-control" value="{{ $adult }} Orang" disabled>
                                </div>
                        </div>
                        <div class="col-md-6 col-12 mt-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Anak Anak</label>
                                <input type="text" name="children" class="form-control" value="{{ $children }} Orang" disabled>
                            </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-12 mt-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total Kamar</label>
                                    <input type="text" name="total_kamar" class="form-control" value="{{ $total_kamar }} Kamar" disabled>
                                </div>
                        </div>
                        <div class="col-md-6 col-12 mt-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Total Hari</label>
                                <input type="text" class="form-control" value="{{ $hari }} Hari" disabled>
                            </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-12 mt-3">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Total Harga</label>
                                    <input type="text" name="total_harga" class="form-control" value="{{ $total_harga }}" disabled>
                                </div>
                        </div>


                    </div>
                    <button type="submit" class="mt-2 btn btn-block btn-info" onclick="return confirm('Yakin ?')">Lanjutkan Pembayaran</button>
                </div>
            </div>


            </form>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

@endsection
