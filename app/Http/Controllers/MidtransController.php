<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Midtrans\Config;
use Midtrans\Notification;
use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        //set konfigurasi midtrans
        Config::$serverKey = config('services.midtrans.serverKey');
        Config::$isProduction = config('services.midtrans.isProduction');
        Config::$isSanitized = config('services.midtrans.isSanitized');
        Config::$is3ds = config('services.midtrans.is3ds');

        //buat instance midtrans
        $notification = new Notification();

        //assign ke variable untuk memudahkan coding

        $status = $notification->transaction_status;


        $transaksi = Transaksi::where('kode_transaksi', $notification->order_id)->first();

        // handler notification status midtrans
        if ($status == "settlement") {

            $transaksi->status = 'SUCCESS';
            $transaksi->save();

            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Payment Success'
                ]
            ]);
        } else if ($status == "pending") {
            $transaksi->status = 'PENDING';
            $transaksi->save();

        } else if ($status == 'deny') {
            $transaksi->status = 'CANCELLED';
            $transaksi->save();
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Payment Deny'
                ]
            ]);
        } else if ($status == 'expired') {
            $transaksi->status = 'CANCELLED';
            $transaksi->save();
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Payment Expired'
                ]
            ]);
        } else if ($status == 'cancel') {
            $transaksi->status = 'CANCELLED';
            $transaksi->save();
            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Payment Cancel'
                ]
            ]);
        } else {
            $transaksi->status = 'CANCELLED';
            $transaksi->save();
            return response()->json([
                'meta' => [
                    'code' => 500,
                    'message' => 'Midtrans Payment Gagal'
                ]
            ]);
        }


    }
}
