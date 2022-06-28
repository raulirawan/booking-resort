@extends('layouts.frontend')

@section('title','Penginapan Sibea-Bea')
@section('content')
    <section class="welcome-area">
        <div class="welcome-slides owl-carousel">
            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide bg-img bg-overlay"
                style="background-image: url({{ asset('frontend') }}/img/bg-img/16.jpg);"
                data-img-url="{{ asset('frontend') }}/img/bg-img/16.jpg">
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12">
                                <div class="welcome-text text-center">
                                    {{-- <h6 data-animation="fadeInLeft" data-delay="200ms">Hotel &amp; Resort</h6> --}}
                                    <h2 data-animation="fadeInLeft" data-delay="500ms" style="font-size: 35px">Welcome To Sibea Bea Resort Samosir</h2>
                                    <a href="#" class="btn roberto-btn btn-2" data-animation="fadeInLeft"
                                        data-delay="800ms">Discover Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide bg-img bg-overlay"
                style="background-image: url({{ asset('frontend') }}/img/bg-img/17.jpg);"
                data-img-url="{{ asset('frontend') }}/img/bg-img/17.jpg">
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12">
                                <div class="welcome-text text-center">
                                    {{-- <h6 data-animation="fadeInUp" data-delay="200ms">Hotel &amp; Resort</h6> --}}
                                    <h2 data-animation="fadeInUp" data-delay="500ms" style="font-size: 35px">Welcome To Sibea Bea Resort Samosir</h2>
                                    <a href="#" class="btn roberto-btn btn-2" data-animation="fadeInUp"
                                        data-delay="800ms">Discover Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide bg-img bg-overlay"
                style="background-image: url({{ asset('frontend') }}/img/bg-img/18.jpg);"
                data-img-url="{{ asset('frontend') }}/img/bg-img/18.jpg">
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12">
                                <div class="welcome-text text-center">
                                    {{-- <h6 data-animation="fadeInDown" data-delay="200ms">Hotel &amp; Resort</h6> --}}
                                    <h2 data-animation="fadeInDown" data-delay="500ms" style="font-size: 35px">Welcome To Sibea Bea Resort Samosir</h2>
                                    <a href="#" class="btn roberto-btn btn-2" data-animation="fadeInDown"
                                        data-delay="800ms">Discover Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Welcome Area End -->

    <!-- About Us Area Start -->
    <section class="roberto-about-area section-padding-100-0">
        <!-- Hotel Search Form Area -->
        <div class="hotel-search-form-area">
            <div class="container-fluid">
                <div class="hotel-search-form">
                    <form action="{{ route('check.availability') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-between align-items-end">
                            <div class="col-6 col-md-2 col-lg-3">
                                <label for="checkIn">Check In</label>
                                <input type="date" class="form-control" id="checkIn" value="{{ date("Y-m-d", strtotime(date("d-m-Y"))) }}" name="checkin_date" required>
                            </div>
                            <div class="col-6 col-md-2 col-lg-3">
                                <label for="checkOut">Check Out</label>
                                <input type="date" class="form-control" id="checkOut" value="{{ date("Y-m-d", strtotime("+1 day", strtotime(date("d-m-Y")))) }}" name="checkout_date" required>
                            </div>
                            <div class="col-4 col-md-1">
                                <label for="room">Jumlah Kamar</label>
                                <select name="room" id="room" class="form-control" required>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                </select>
                            </div>
                            <div class="col-4 col-md-1">
                                <label for="adults">Dewasa</label>
                                <select name="adults" id="adults" class="form-control" required>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                </select>
                            </div>
                            <div class="col-4 col-md-2 col-lg-1">
                                <label for="children">Anak - Anak</label>
                                <select name="children" id="children" class="form-control" required>
                                    <option value="0">00</option>
                                    <option value="1">01</option>
                                    <option value="2">02</option>
                                    <option value="3">03</option>
                                    <option value="4">04</option>
                                    <option value="5">05</option>
                                    <option value="6">06</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <button type="submit" class="form-control btn roberto-btn w-100">Check
                                    Availability</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container mt-100">
            <div class="row align-items-center">
                <div class="col-12 col-lg-6">
                    <!-- Section Heading -->
                    <div class="section-heading wow fadeInUp" data-wow-delay="100ms">
                        <h6>About Us</h6>
                        <h2>Welcome to <br>Roberto Hotel Luxury</h2>
                    </div>
                    <div class="about-us-content mb-100">
                        <h5 class="wow fadeInUp" data-wow-delay="300ms">With over 340 hotels worldwide, NH Hotel Group
                            offers a wide variety of hotels catering for a perfect stay no matter where your destination.
                        </h5>
                        <p class="wow fadeInUp" data-wow-delay="400ms">Manager: <span>Michen Taylor</span></p>
                        <img src="{{ asset('frontend') }}/img/bg-img/signature.png" alt="" class="wow fadeInUp"
                            data-wow-delay="500ms">
                    </div>
                </div>

                <div class="col-12 col-lg-6">
                    <div class="about-us-thumbnail mb-100 wow fadeInUp" data-wow-delay="700ms">
                        <div class="row no-gutters">
                            <div class="col-6">
                                <div class="single-thumb">
                                    <img src="{{ asset('frontend') }}/img/bg-img/13.jpg" alt="">
                                </div>
                                <div class="single-thumb">
                                    <img src="{{ asset('frontend') }}/img/bg-img/14.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="single-thumb">
                                    <img src="{{ asset('frontend') }}/img/bg-img/15.jpg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Area End -->

    <!-- Service Area Start -->
    <div class="roberto-service-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="service-content d-flex align-items-center justify-content-between">
                        <!-- Single Service Area -->
                        <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="100ms">
                            <img src="{{ asset('frontend') }}/img/core-img/icon-1.png" alt="">
                            <h5>Transportion</h5>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="300ms">
                            <img src="{{ asset('frontend') }}/img/core-img/icon-2.png" alt="">
                            <h5>Reiseservice</h5>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="500ms">
                            <img src="{{ asset('frontend') }}/img/core-img/icon-3.png" alt="">
                            <h5>Spa Relaxtion</h5>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="700ms">
                            <img src="{{ asset('frontend') }}/img/core-img/icon-4.png" alt="">
                            <h5>Restaurant</h5>
                        </div>

                        <!-- Single Service Area -->
                        <div class="single-service--area mb-100 wow fadeInUp" data-wow-delay="900ms">
                            <img src="{{ asset('frontend') }}/img/core-img/icon-1.png" alt="">
                            <h5>Bar &amp; Drink</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service Area End -->

    <!-- Our Room Area Start -->
    <section class="roberto-rooms-area">
        <div class="rooms-slides owl-carousel">
            <!-- Single Room Slide -->
            @foreach (App\Kamar::all() as $kamar)
            <div class="single-room-slide d-flex align-items-center">
                <!-- Thumbnail -->
                <div class="room-thumbnail h-100 bg-img"
                    style="background-image: url({{ asset(json_decode($kamar->gambar)[0]) }});"></div>

                <!-- Content -->
                <div class="room-content">
                    <h2 data-animation="fadeInUp" data-delay="100ms">{{ $kamar->nama_kamar }}</h2>
                    <h3 data-animation="fadeInUp" data-delay="300ms">Rp{{ number_format($kamar->harga) }} <span>/ Hari</span></h3>
                    <ul class="room-feature" data-animation="fadeInUp" data-delay="500ms">
                        <li><span><i class="fa fa-check"></i> Size</span> <span>: {{ $kamar->luas }} ft</span></li>
                        <li><span><i class="fa fa-check"></i> Tipe</span> <span>: {{ $kamar->tipe_kamar }}</span></li>
                        <li><span><i class="fa fa-check"></i> Bed</span> <span>: {{ $kamar->jenis_bed }}</span></li>
                        <li><span><i class="fa fa-check"></i> Services</span> <span>:
                            @foreach (json_decode($kamar->services) as $service)
                                {{ $service }},
                            @endforeach
                        </span>
                        </li>
                    </ul>
                </div>
            </div>
            @endforeach

            <!-- Single Room Slide -->

        </div>
    </section>
    <!-- Our Room Area End -->



    <!-- Blog Area Start -->
    <section class="roberto-blog-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center wow fadeInUp" data-wow-delay="100ms">
                        <h6>Referensi Wisata</h6>
                        <h2>Wisata Terdekat</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Single Post Area -->
                @foreach (App\ObjekWisata::all() as $wisata)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-post-area mb-100 wow fadeInUp" data-wow-delay="300ms">
                        <a href="{{ $wisata->link_maps }}" target="_blank" class="post-thumbnail"><img src="{{ asset($wisata->gambar) }}"
                                alt=""></a>
                        <a href="#" class="post-title">{{ $wisata->nama_wisata }}</a>
                        <p style="display: inline-block; float: right"><span>{{ $wisata->jarak }}</span>
                        </p>
                        <a href="index.html" class="btn continue-btn"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>

                @endforeach
                <!-- Single Post Area -->


            </div>
        </div>
    </section>
    <!-- Blog Area End -->


@endsection
