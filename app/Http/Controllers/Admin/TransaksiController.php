<?php

namespace App\Http\Controllers\Admin;

use App\Transaksi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            if (!empty($request->from_date)) {
                if ($request->from_date === $request->to_date) {
                    $query  = Transaksi::query();
                    if ($request->status_transaksi != 'SEMUA') {
                        $query->with(['kamar', 'pengunjung'])
                        ->whereDate('created_at', $request->from_date)
                        ->where('status', $request->status_transaksi);
                    }else {
                        $query->with(['kamar', 'pengunjung'])
                        ->whereDate('created_at', $request->from_date);
                    }


                } else {
                    $query  = Transaksi::query();
                    if ($request->status_transaksi != 'SEMUA') {
                        $query->with(['kamar', 'pengunjung'])
                        ->whereBetween('created_at', [$request->from_date . ' 00:00:00', $request->to_date . ' 23:59:59'])
                        ->where('status', $request->status_transaksi);
                    } else {
                        $query->with(['kamar', 'pengunjung'])
                        ->whereBetween('created_at', [$request->from_date . ' 00:00:00', $request->to_date . ' 23:59:59']);
                    }


                }
            } else {
                $today = date('Y-m-d');
                $query  = Transaksi::query();
                if ($request->status_transaksi != 'SEMUA') {
                    $query->with(['kamar', 'pengunjung'])
                    ->whereDate('created_at', $today)
                    ->where('status', $request->status_transaksi);
                } else {
                    $query->with(['kamar', 'pengunjung'])
                    ->whereDate('created_at', $today);
                }


            }

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '<button
                            id="detail"
                            data-tanggal_transaksi="' . $item->created_at . '"
                            data-kode_transaksi="' . $item->kode_transaksi . '"
                            data-nama_pengunjung="' . $item->pengunjung->name . '"
                            data-nama_kamar="' . $item->kamar->nama_kamar . '"
                            data-tipe_kamar="' . $item->kamar->tipe_kamar . '"
                            data-jenis_bed="' . $item->kamar->jenis_bed . '"
                            data-tanggal_check_in="' . $item->tanggal_check_in . '"
                            data-tanggal_check_out="' . $item->tanggal_check_out . '"
                            data-jumlah_kamar="' . $item->jumlah_kamar . '"
                            data-adult="' . $item->adult . '"
                            data-children="' . $item->children . '"
                            data-total_harga="' . $item->total_harga . '"
                            data-status="' . $item->status . '"
                            data-bs-toggle="modal"
                            data-bs-target="#modal-detail"
                            class="btn btn-sm btn-primary"
                            >Detail</button>';
                })
                ->editColumn('status', function ($item) {
                    if ($item->status == 'CHECK IN') {
                        return '<span class="badge bg-success">CHECK IN</span>';
                    } elseif ($item->status == 'CHECK OUT') {
                        return '<span class="badge bg-danger">CHECK OUT</span>';
                    } elseif ($item->status == 'PENDING') {
                        return '<span class="badge bg-warning">PENDING</span>';
                    } elseif ($item->status == 'SUCCESS') {
                        return '<span class="badge bg-success">SUCCESS</span>';
                    } else {
                        return '<span class="badge badge-danger">CANCELLED</span>';
                    }
                })
                ->editColumn('created_at', function ($item) {
                    return $item->created_at;
                })
                ->rawColumns(['action', 'status'])
                ->make();
        }
        return view('admin.transaksi.index');
    }

    public function checkInIndex()
    {
        $data = Transaksi::where('status', 'SUCCESS')->get();
        return view('admin.transaksi.index-check-in-out', compact('data'));
    }
    public function checkOutIndex()
    {
        $data = Transaksi::whereIn('status', ['CHECK IN', 'CHECK OUT'])->get();
        return view('admin.transaksi.index-check-in-out', compact('data'));
    }

    public function updateStatusCheckInOut($id)
    {
        $data = Transaksi::findOrFail($id);

        if ($data->status == 'SUCCESS') {
            $data->status = 'CHECK IN';
            $route = 'admin.transaksi.check.in.index';
        } elseif ($data->status == 'CHECK IN') {
            $data->status = 'CHECK OUT';
            $route = 'admin.transaksi.check.out.index';
        }
        $data->save();
        if ($data != null) {
            Alert::success('Success', 'Data Berhasil di Update');
            return redirect()->route($route);
        } else {
            Alert::error('Error', 'Data Gagal di Update');
            return redirect()->route($route);
        }
    }

    public function cancel($id)
    {
        $data = Transaksi::findOrFail($id);

        $data->status = 'CANCELLED';
        $data->save();
        if ($data != null) {
            Alert::success('Success', 'Data Berhasil di Cancel');
            return redirect()->route('admin.transaksi.check.in.index');
        } else {
            Alert::error('Error', 'Data Gagal di Cancel');
            return redirect()->route('admin.transaksi.check.in.index');
        }
    }
}
