<?php

namespace App\Http\Controllers;

use App\Kamar;
use Illuminate\Http\Request;

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
        dd($request->all());
    }
}
