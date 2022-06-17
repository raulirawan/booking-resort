<?php

namespace App\Http\Controllers\Admin;

use App\Kamar;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class KamarController extends Controller
{
    public function index()
    {

        $kamar = Kamar::all();
        return view('admin.kamar.index', compact('kamar'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
            'gambar.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
            'gambar.*.mimes' => 'Gambar Harus Bertipe PNG, JPG, JPEG atau BMP',
            ]
        );


        $data = new Kamar();
        $data->nama_kamar = $request->nama_kamar;
        $data->slug = Str::slug($request->nama_kamar);
        $data->tipe_kamar = $request->tipe_kamar;
        $data->jenis_bed = $request->jenis_bed;
        $data->luas = $request->luas;
        $data->harga = $request->harga;
        $data->stok = $request->stok;

        if($request->hasFile('gambar')) {
            $dataGambar = [];
            foreach ($request->file('gambar') as $key => $val) {
                $tujuan_upload = 'image/kamar/';
                $nama_file = time()."_".$val->getClientOriginalName();
                $nama_file = str_replace(' ', '', $nama_file);
                $val->move($tujuan_upload,$nama_file);

                $dataGambar[] =$tujuan_upload.$nama_file;
            }

            $gambar = json_encode($dataGambar);
            $data->gambar = $gambar;
        }
        $services = json_encode($request->services);

        $data->services = $services;
        $data->save();

        if($data != null) {
            Alert::success('Success','Data Berhasil di Tambah');
            return redirect()->route('admin.kamar.index');
        }else {
            Alert::error('Error','Data Gagal di Tambah');
            return redirect()->route('admin.kamar.index');
        }
    }

    public function edit($id)
    {
        $data = Kamar::findOrFail($id);
        return view('admin.kamar.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {
        $request->validate(
            [
            'gambar.*' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
            'gambar.*.mimes' => 'Gambar Harus Bertipe PNG, JPG, JPEG atau BMP',
            ]
        );

        $data = Kamar::findOrFail($id);
        $data->nama_kamar = $request->nama_kamar;
        $data->slug = Str::slug($request->nama_kamar);
        $data->tipe_kamar = $request->tipe_kamar;
        $data->jenis_bed = $request->jenis_bed;
        $data->luas = $request->luas;
        $data->harga = $request->harga;
        $data->stok = $request->stok;
        $services = json_encode($request->services);

        $data->services = $services;

        if($request->hasFile('gambar')) {
            $dataGambar = [];
            foreach ($request->file('gambar') as $key => $val) {
                $tujuan_upload = 'image/kamar/';
                $nama_file = time()."_".$val->getClientOriginalName();
                $nama_file = str_replace(' ', '', $nama_file);
                $val->move($tujuan_upload,$nama_file);

                $dataGambar[] =$tujuan_upload.$nama_file;
            }
            if($data->gambar != null) {
                $oldGambar = json_decode($data->gambar);
                $newGambar = array_merge($oldGambar, $dataGambar);
                $gambar = json_encode($newGambar);

            } else {
                $gambar = json_encode($dataGambar);
            }

            $data->gambar = $gambar;
        }
        $data->save();
        if($data != null) {
            Alert::success('Success','Data Berhasil di Update');
            return redirect()->route('admin.kamar.index');
        }else {
            Alert::error('Error','Data Gagal di Update');
            return redirect()->route('admin.kamar.index');
        }
    }

    public function delete($id)
    {
        $data = Kamar::findOrFail($id);
        if($data != null) {
            $gambar = json_decode($data->gambar);
            foreach ($gambar as $value) {
                if(file_exists($value)) {
                    unlink($value);
                }
            }
            $data->delete();
            Alert::success('Success','Data Berhasil di Hapus');
            return redirect()->route('admin.kamar.index');
        }else {
            Alert::error('Error','Data Gagal di Hapus');
            return redirect()->route('admin.kamar.index');
        }

    }

    public function deleteGambar($id, $keyGambar)
    {
        $data = Kamar::findOrFail($id);

        $gambar = json_decode($data->gambar);
        $gambarBaru = [];

        foreach ($gambar as $key => $value) {
            if($key == $keyGambar)
            {
                if(file_exists($value)) {
                    unlink($value);
                }
                unset($value);
            }else {
                $gambarBaru[] = $value;
            }
        }

        $data->gambar = json_encode($gambarBaru);
        $data->save();
        if($data != null) {
            Alert::success('Success','Data Berhasil di Hapus');
            return redirect()->route('admin.kamar.edit', $id);
        }else {
            Alert::error('Error','Data Gagal di Hapus');
            return redirect()->route('admin.kamar.edit', $id);
        }
    }
}
