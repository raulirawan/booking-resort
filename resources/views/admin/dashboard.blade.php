@extends('layouts.admin')

@section('title', 'Halaman Dashboard Admin')

@section('content')
{{-- <style>
    /* .page-content{
        zoom: 80%;
    } */

    .sidebar-wrapper {
        height: 125vh;
    }
    body.theme-dark .sidebar-wrapper{
        height: 125vh;
    }
    html {
    -moz-transform: scale(0.8, 0.8);
    -ms-transform: scale(0.8);
    -webkit-transform: scale(0.8);
    transform: scale(0.8);

    width:125%; /* to compensate for the 0.8 scale */
    transform-origin:0 0;
}
</style> --}}
<div class="page-heading">
    <h3>Data Statistik</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Pendapatan</h6>
                                    <h6 class="font-extrabold mb-0">{{ number_format(App\Transaksi::whereIn('status',['SUCCESS','CHECK IN','CHECK OUT'])->sum('total_harga')) }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Pengunjung</h6>
                                    <h6 class="font-extrabold mb-0">{{ App\User::where('roles','PENGUNJUNG')->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="bi bi-house-fill" style="width: auto; height: auto;"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Kamar</h6>
                                    <h6 class="font-extrabold mb-0">{{ App\Kamar::count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Transaksi Success</h6>
                                    <h6 class="font-extrabold mb-0">{{ App\Transaksi::where('status','SUCCESS')->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
</div>
@endsection
