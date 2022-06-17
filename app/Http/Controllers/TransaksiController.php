<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = Transaksi::where('user_id',Auth::user()->id)->get();
        return view('transaksi', compact('data'));
    }
}
