@extends('layouts.frontend')

@section('title', 'Data Kamar')

@section('content')
    <!-- Breadcrumb Area Start -->
     <!-- Breadcrumb Area Start -->
     <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{ asset('frontend') }}/img/bg-img/16.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcrumb-content d-flex align-items-center justify-content-between pb-5">
                        <h2 class="room-title">{{ $kamar->nama_kamar }}</h2>
                        <h2 class="room-price">Rp{{ number_format($kamar->harga) }}<span>/ Per Malam</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Rooms Area Start -->
    <div class="roberto-rooms-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8 mx-auto">
                    <!-- Single Room Details Area -->
                    <div class="single-room-details-area mb-50">
                        <!-- Room Thumbnail Slides -->
                        <div class="room-thumbnail-slides mb-50">
                            <div id="room-thumbnail--slide" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{ asset(json_decode($kamar->gambar)[0]) }}" class="d-block w-100" alt="">
                                    </div>
                                  @foreach (json_decode($kamar->gambar) as $gambar)
                                  <div class="carousel-item">
                                    <img src="{{ asset($gambar) }}" class="d-block w-100" alt="">
                                </div>
                                  @endforeach

                                </div>

                                <ol class="carousel-indicators">
                                    @foreach (json_decode($kamar->gambar) as $gambar)
                                    <li data-target="#room-thumbnail--slide" data-slide-to="{{ $loop->iteration - 1 }}" class="active">
                                        <img src="{{ asset($gambar) }}" class="d-block w-100" alt="">
                                    </li>
                                    @endforeach
                                </ol>
                            </div>
                        </div>

                        <!-- Room Features -->
                        <div class="room-features-area d-flex flex-wrap mb-50">
                            <h6>Size: <span>{{ $kamar->luas }} ft</span></h6>
                            <h6>Tipe Kamar: <span>{{ $kamar->tipe_kamar }}</span></h6>
                            <h6>Bed: <span>{{ $kamar->jenis_bed }}</span></h6>
                            <h6>Services:
                            <span>
                                @foreach (json_decode($kamar->services) as $service)
                                   {{ $service }}
                                @endforeach
                            </span></h6>
                        </div>

                      @auth
                      <a href="{{ route('booking.form') }}?from={{ $from }}&to={{ $to }}&kamar_id={{ $kamar_id }}&adult={{ $adult }}&children={{ $children }}&total_kamar={{ $total_kamar }}" class="btn btn-info btn-lg btn-block" >
                        Booking Sekarang
                    </a>
                      @endauth
                      @guest
                      <a href="{{ route('login') }}" class="btn btn-info btn-lg btn-block" >
                        Login
                    </a>
                      @endguest

                    <!-- Room Service -->


                </div>

            </div>
        </div>
    </div>
@endsection
