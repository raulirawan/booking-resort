<?php

namespace App\Http\Controllers;

use App\Kamar;
use Exception;
use App\Transaksi;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function formBooking(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $kamar_id = $request->kamar_id;
        $adult = $request->adult;
        $children = $request->children;
        $total_kamar = $request->total_kamar;
        $kamar = Kamar::findOrFail($kamar_id);

        $tgl1 = strtotime($from);
        $tgl2 = strtotime($to);

        $jarak = $tgl2 - $tgl1;

        $hari = $jarak / 60 / 60 / 24;

        $total_harga = $kamar->harga * $hari * $total_kamar;
        return view('form-booking', compact('from','to','kamar_id','adult','children','total_kamar','kamar','hari','total_harga'));
    }

    public function formBookingPost(Request $request)
    {
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        $kode_transaksi = 'KMR-'.mt_rand(0000,9999);

        // buat transaksi
        $transaksi = new Transaksi();

        $transaksi->user_id = Auth::user()->id;
        $transaksi->kamar_id = $request->kamar_id;
        $transaksi->kode_transaksi = $kode_transaksi;
        $transaksi->total_harga = $request->total_harga;
        $transaksi->tanggal_check_in = $request->tanggal_check_in;
        $transaksi->tanggal_check_out = $request->tanggal_check_out;
        $transaksi->jumlah_kamar = $request->jumlah_kamar;
        $transaksi->adult = $request->adult;
        $transaksi->children = $request->children;
        $transaksi->status = 'PENDING';

         // kirim ke midtrans
         $midtrans_params = [
            'transaction_details' => [
                'order_id' => $kode_transaksi,
                'gross_amount' => (int) $request->total_harga,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'callbacks' => [
                'finish' => 'https://sibeabearesort.my.ic.com/transaksi',
            ],
            'enable_payments' => ['bca_va','permata_va','bni_va','bri_va','gopay'],
            'vtweb' => [],
        ];

        try {
            //ambil halaman payment midtrans

            $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

            $transaksi->link_pembayaran = $paymentUrl;
            $transaksi->save();

            return redirect($paymentUrl);
            //reditect halaman midtrans
        } catch (Exception $e) {
            echo $e->getMessage();
            exit;
        }
    }
}
