@extends('layouts.frontend')

@section('title', 'Halaman Transaksi')

@section('content')
    <div class="breadcrumb-area bg-img bg-overlay jarallax"
        style="background-image: url({{ asset('frontend') }}/img/bg-img/17.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content text-center">
                        <h2 class="page-title">Transaksi</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Transaksi</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="roberto-news-area section-padding-100-0" style="padding-bottom: 200px">
        <div class="container">
            <h3>Data Transaksi</h3>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tr>
                                        <th style="width: 10%">Tanggal</th>
                                        <th>Kode</th>
                                        <th>Nama Kamar</th>
                                        <th>Check In</th>
                                        <th>Check Out</th>
                                        <th>Status</th>
                                        <th>Total Harga</th>
                                        <th style="width: 15%">Aksi</th>
                                    </tr>
                                    <tbody>
                                        @foreach ($data as $transaksi)
                                            <tr>
                                                <td>{{ $transaksi->created_at }}</td>
                                                <td>{{ $transaksi->kode_transaksi }}</td>
                                                <td>{{ $transaksi->kamar->nama_kamar }}</td>
                                                <td>{{ $transaksi->tanggal_check_in }}</td>
                                                <td>{{ $transaksi->tanggal_check_out }}</td>
                                                <td class="text-white">
                                                    @if ($transaksi->status == 'CHECK IN')
                                                        <span class="badge bg-success">CHECK IN</span>
                                                    @elseif ($transaksi->status == 'CHECK OUT')
                                                        <span class="badge bg-danger">CHECK OUT</span>
                                                    @elseif ($transaksi->status == 'PENDING')
                                                        <span class="badge bg-warning">PENDING</span>
                                                    @elseif ($transaksi->status == 'SUCCESS')
                                                        <span class="badge bg-success">SUCCESS</span>
                                                    @else
                                                        <span class="badge bg-danger">CANCELLED</span>
                                                    @endif
                                                </td>
                                                <td>Rp{{ number_format($transaksi->total_harga) }}</td>
                                                <td>
                                                    <button id="detail"
                                                        data-tanggal_transaksi="{{ $transaksi->created_at }}"
                                                        data-kode_transaksi="{{ $transaksi->kode_transaksi }}"
                                                        data-nama_pengunjung="{{ $transaksi->pengunjung->name }}"
                                                        data-nama_kamar="{{ $transaksi->kamar->nama_kamar }}"
                                                        data-tipe_kamar="{{ $transaksi->kamar->tipe_kamar }}"
                                                        data-jenis_bed="{{ $transaksi->kamar->jenis_bed }}"
                                                        data-tanggal_check_in="{{ $transaksi->tanggal_check_in }}"
                                                        data-tanggal_check_out="{{ $transaksi->tanggal_check_out }}"
                                                        data-jumlah_kamar="{{ $transaksi->jumlah_kamar }}"
                                                        data-adult="{{ $transaksi->adult }}"
                                                        data-children="{{ $transaksi->children }}"
                                                        data-total_harga="{{ $transaksi->total_harga }}"
                                                        data-status="{{ $transaksi->status }}" data-toggle="modal"
                                                        data-target="#modal-detail"
                                                        class="btn btn-info btn-sm">Detail</button>
                                                        @if ($transaksi->status == 'PENDING')
                                                        <a href="{{ $transaksi->link_pembayaran }}" target="_blank" class="btn btn-sm btn-success">Bayar</a>
                                                        @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <div class="modal fade text-left" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <form action="#" id="form-edit" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel1">Detail Transaksi</h5>
                        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table">
                                    <tr>
                                        <th>Tanggal Transaksi</th>
                                        <td id="tanggal_transaksi"></td>
                                    </tr>
                                    <tr>
                                        <th>Kode Transaksi</th>
                                        <td id="kode_transaksi"></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Pengunjung</th>
                                        <td id="nama_pengunjung"></td>
                                    </tr>
                                    <tr>
                                        <th>Nama Kamar</th>
                                        <td id="nama_kamar"></td>
                                    </tr>
                                    <tr>
                                        <th>Tipe Kamar</th>
                                        <td id="tipe_kamar"></td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Bed</th>
                                        <td id="jenis_bed"></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Check In</th>
                                        <td id="tanggal_check_in"></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Check Out</th>
                                        <td id="tanggal_check_out"></td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Kamar</th>
                                        <td id="jumlah_kamar"></td>
                                    </tr>
                                    <tr>
                                        <th>Dewasa</th>
                                        <td id="adult"></td>
                                    </tr>
                                    <tr>
                                        <th>Anak - Anak</th>
                                        <td id="children"></td>
                                    </tr>
                                    <tr>
                                        <th>Total Harga</th>
                                        <td id="total_harga"></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td id="status"></td>
                                    </tr>
                                </table>


                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('down-script')
        <script>
            $(document).ready(function() {
                function numberWithCommas(x) {
                    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }

                function statusTransaksi(status) {
                    if (status == 'CHECK IN') {
                        return '<span class="text-white badge bg-success">CHECK IN</span>';
                    } else if (status == 'CHECK OUT') {
                        return '<span class="text-white badge bg-danger">CHECK OUT</span>';
                    } else if (status == 'PENDING') {
                        return '<span class="text-white badge bg-warning">PENDING</span>';
                    } else if (status == 'SUCCESS') {
                        return '<span class="text-white badge bg-success">SUCCESS</span>';
                    } else {
                        return '<span class="text-white badge bg-danger">CANCELLED</span>';
                    }
                }

                $(document).on('click', '#detail', function() {
                    $('#status').empty();
                    var tanggal_transaksi = $(this).data('tanggal_transaksi');
                    var kode_transaksi = $(this).data('kode_transaksi');
                    var nama_pengunjung = $(this).data('nama_pengunjung');
                    var nama_kamar = $(this).data('nama_kamar');
                    var tipe_kamar = $(this).data('tipe_kamar');
                    var jenis_bed = $(this).data('jenis_bed');
                    var tanggal_check_in = $(this).data('tanggal_check_in');
                    var tanggal_check_out = $(this).data('tanggal_check_out');
                    var jumlah_kamar = $(this).data('jumlah_kamar');
                    var adult = $(this).data('adult');
                    var children = $(this).data('children');
                    var total_harga = $(this).data('total_harga');
                    var status = $(this).data('status');

                    $('#tanggal_transaksi').text(tanggal_transaksi);
                    $('#kode_transaksi').text(kode_transaksi);
                    $('#nama_pengunjung').text(nama_pengunjung);
                    $('#nama_kamar').text(nama_kamar);
                    $('#tipe_kamar').text(tipe_kamar);
                    $('#jenis_bed').text(jenis_bed);
                    $('#tanggal_check_in').text(tanggal_check_in);
                    $('#tanggal_check_out').text(tanggal_check_out);
                    $('#jumlah_kamar').text(jumlah_kamar + ' Kamar');
                    $('#adult').text(adult + ' Orang');
                    $('#children').text(children + ' Orang');
                    $('#total_harga').text('Rp' + numberWithCommas(total_harga));
                    $('#status').append(statusTransaksi(status));
                });
            });
        </script>
    @endpush
@endsection
