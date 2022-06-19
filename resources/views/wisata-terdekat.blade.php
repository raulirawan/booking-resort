@extends('layouts.frontend')

@section('title','Wisata Terdekat')
@section('content')

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
