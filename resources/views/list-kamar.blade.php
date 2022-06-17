@extends('layouts.frontend')

@section('title', 'Data Kamar')

@section('content')
    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-img bg-overlay jarallax"
        style="background-image: url({{ asset('frontend') }}/img/bg-img/16.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Kamar Kami</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Kamar</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Rooms Area Start -->
    <div class="roberto-rooms-area section-padding-100-0">
        <div class="container">
            <h3>Kamar Tersedia Dari Tanggal {{ $from }} S/D {{ $to }}</h3>
            <div class="row mt-5">
                <div class="col-12 col-lg-8">
                    <!-- Single Room Area -->
                    @foreach ($kamar as $item)
                        <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                            <!-- Room Thumbnail -->
                            <div class="room-thumbnail">
                                <img src="{{ asset(json_decode($item->gambar)[0]) }}" alt="">
                            </div>
                            <!-- Room Content -->
                            <div class="room-content">
                                <h2>{{ $item->nama_kamar }}</h2>
                                <h4>Rp{{ number_format($item->harga) }} <span>/ Hari</span></h4>
                                <div class="room-feature">
                                    <h6>Luas: <span>{{ $item->luas }} ft</span></h6>
                                    <h6>Tipe Kamar: <span>{{ $item->tipe_kamar }}</span></h6>
                                    <h6>Bed: <span>{{ $item->jenis_bed }}</span></h6>
                                    @php
                                        $services = json_decode($item->services)
                                    @endphp
                                    <h6>Services: <span>
                                        @foreach ($services as $key => $service)
                                        {{ $service }},
                                        @endforeach
                                </span></h6>
                                </div>
                                <a href="{{ route('kamar.detail', $item->slug) }}?from={{ $from }}&to={{ $to }}&kamar_id={{ $item->id }}&adult={{ $adult }}&children={{ $children }}&total_kamar={{ $total_kamar }}" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>
                    @endforeach

                    <!-- Single Room Area -->

                </div>

                {{-- <div class="col-12 col-lg-4">
                    <!-- Hotel Reservation Area -->
                    <div class="hotel-reservation--area mb-100">
                        <form action="#" method="post">
                            <div class="form-group mb-30">
                                <label for="checkInDate">Date</label>
                                <div class="input-daterange" id="datepicker">
                                    <div class="row no-gutters">
                                        <div class="col-6">
                                            <input type="text" class="input-small form-control" id="checkInDate" name="checkInDate" placeholder="Check In">
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="input-small form-control" name="checkOutDate" placeholder="Check Out">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-30">
                                <label for="guests">Guests</label>
                                <div class="row">
                                    <div class="col-6">
                                        <select name="adults" id="guests" class="form-control">
                                            <option value="adults">Adults</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                        </select>
                                    </div>
                                    <div class="col-6">
                                        <select name="children" id="children" class="form-control">
                                            <option value="children">Children</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn roberto-btn w-100">Check Available</button>
                            </div>
                        </form>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
@endsection
