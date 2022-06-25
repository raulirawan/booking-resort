<?php

namespace App\Http\Controllers;

use App\Kamar;
use App\Transaksi;
use Illuminate\Http\Request;

class CheckAvailabilityController extends Controller
{
    public function search(Request $request)
    {
        $from = $request->checkin_date;
        $to = $request->checkout_date;
        $total_kamar = $request->room;
        $adult = $request->adults;
        $children = $request->children;

        $kamar = Kamar::whereNotIn('id', function($query) use ($from, $to) {
            $query->from('transaksi')
             ->select('kamar_id')
             ->where('tanggal_check_in', '<=', $from)
             ->where('tanggal_check_out', '>=', $to)
             ->whereIn('status',['SUCCESS','CHECKIN']);
         })
         ->get();
        return view('list-kamar', compact('from','to','kamar','total_kamar','adult','children'));
    }

    public function kamarDetail(Request $request,$slug)
    {
        $from = $request->from;
        $to = $request->to;
        $kamar_id = $request->kamar_id;
        $total_kamar = $request->total_kamar;
        $adult = $request->adult;
        $children = $request->children;

        $kamar = Kamar::where('slug', $slug)->firstOrFail();

        return view('kamar-detail', compact('kamar','from','to','kamar_id','total_kamar','adult','children'));
    }
}
