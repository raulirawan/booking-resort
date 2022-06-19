@extends('layouts.frontend')

@section('title','Kamar')
@section('content')

  <!-- Breadcrumb Area Start -->
  <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url({{ asset('frontend/img/bg-img/16.jpg') }});">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="breadcrumb-content text-center">
                    <h2 class="page-title">Kamar Kami</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
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
        <div class="row">
            <div class="col-12 col-lg-8">
                <!-- Single Room Area -->
                @foreach (App\Kamar::all() as $kamar)
                <div class="single-room-area d-flex align-items-center mb-50 wow fadeInUp" data-wow-delay="100ms">
                    <!-- Room Thumbnail -->
                    <div class="room-thumbnail">
                        <img src="{{ asset(json_decode($kamar->gambar)[0]) }}" alt="">
                    </div>
                    <!-- Room Content -->
                    <div class="room-content">
                        <h2>{{ $kamar->nama_kamar }}</h2>
                        <h4>Rp{{ number_format($kamar->harga) }} <span>/ Hari</span></h4>
                        <div class="room-feature">
                            <h6>Luas: <span>{{ $kamar->luas }} ft</span></h6>
                            <h6>Tipe Kamar: <span>{{ $kamar->tipe_kamar }}</span></h6>
                            <h6>Bed: <span>{{ $kamar->jenis_bed }}</span></h6>
                            @php
                                $services = json_decode($kamar->services)
                            @endphp
                            <h6>Services: <span>
                                @foreach ($services as $key => $service)
                                {{ $service }},
                                @endforeach
                        </span></h6>
                        </div>
                        {{-- <a href="{{ route('kamar.detail', $kamar->slug) }}" class="btn view-detail-btn">View Details <i class="fa fa-long-arrow-right"
                                aria-hidden="true"></i></a> --}}
                    </div>
                </div>
                @endforeach



                <!-- Pagination -->
                {{-- <nav class="roberto-pagination wow fadeInUp mb-100" data-wow-delay="1000ms">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next <i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </nav> --}}
            </div>

            <div class="col-12 col-lg-4">
                <!-- Hotel Reservation Area -->
                <div class="hotel-reservation--area mb-100">
                    <form action="{{ route('check.availability') }}" method="post">
                        @csrf
                        <div class="form-group mb-30">
                            <label for="checkInDate">Tanggal</label>
                            <div class="input-daterange" id="datepicker">
                                <div class="row no-gutters">
                                    <div class="col-6">
                                        <input type="date" class="input-small form-control" value="{{ date("Y-m-d", strtotime(date("d-m-Y"))) }}" name="checkin_date" placeholder="Check In" required>
                                    </div>
                                    <div class="col-6">
                                        <input type="date" class="input-small form-control" value="{{ date("Y-m-d", strtotime("+1 day", strtotime(date("d-m-Y")))) }}" name="checkout_date" placeholder="Check Out" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-30">
                            <label for="guests">Jumlah Kamar</label>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <select name="room" id="room" class="form-control" required>
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                        <option value="6">06</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                 <label for="guests">Dewasa</label>
                                    <select name="adults" id="guests" class="form-control" required>
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                        <option value="6">06</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                 <label for="guests">Anak - Anak</label>
                                    <select name="children" id="children" class="form-control" required>
                                        <option value="1">01</option>
                                        <option value="2">02</option>
                                        <option value="3">03</option>
                                        <option value="4">04</option>
                                        <option value="5">05</option>
                                        <option value="6">06</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn roberto-btn w-100">Check Available</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Rooms Area End -->


@endsection
