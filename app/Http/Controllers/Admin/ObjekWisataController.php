<?php

namespace App\Http\Controllers\Admin;

use App\ObjekWisata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class ObjekWisataController extends Controller
{
    public function index()
    {
        $data = ObjekWisata::all();
        return view('admin.object-wisata.index', compact('data'));
    }
    public function store(Request $request)
    {

        $data = new ObjekWisata();
        $data->nama_wisata = $request->nama_wisata;
        $data->jarak = $request->jarak;
        $data->link_maps = $request->link_maps;

        if($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $tujuan_upload = 'image/wisata/';
            $nama_file = time()."_".$file->getClientOriginalName();
            $nama_file = str_replace(' ', '', $nama_file);
            $file->move($tujuan_upload,$nama_file);

            $data->gambar = $tujuan_upload.$nama_file;
        }

        $data->save();

        if($data != null) {
            Alert::success('Success','Data Berhasil di Tambah');
            return redirect()->route('admin.objek.wisata.index');
        }else {
            Alert::error('Error','Data Gagal di Tambah');
            return redirect()->route('admin.objek.wisata.index');
        }
    }
    public function update(Request $request, $id)
    {
        $data = ObjekWisata::findOrFail($id);
        $data->nama_wisata = $request->nama_wisata;
        $data->jarak = $request->jarak;
        $data->link_maps = $request->link_maps;

        if($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $tujuan_upload = 'image/wisata/';
            $nama_file = time()."_".$file->getClientOriginalName();
            $nama_file = str_replace(' ', '', $nama_file);
            $file->move($tujuan_upload,$nama_file);
            if(file_exists($data->gambar)) {
                unlink($data->gambar);
            }
            $data->gambar = $tujuan_upload.$nama_file;
        }
        $data->save();
        if($data != null) {
            Alert::success('Success','Data Berhasil di Update');
            return redirect()->route('admin.objek.wisata.index');
        }else {
            Alert::error('Error','Data Gagal di Update');
            return redirect()->route('admin.objek.wisata.index');
        }
    }

    public function delete($id)
    {
        $data = ObjekWisata::findOrFail($id);
        if($data != null) {
            $data->delete();
            Alert::success('Success','Data Berhasil di Hapus');
            return redirect()->route('admin.objek.wisata.index');
        }else {
            Alert::error('Error','Data Gagal di Hapus');
            return redirect()->route('admin.objek.wisata.index');
        }

    }
}
