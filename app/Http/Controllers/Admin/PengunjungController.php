<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PengunjungController extends Controller
{
    public function index()
    {

        $pelanggan = User::where('roles','PENGUNJUNG')->get();
        return view('admin.pengunjung.index', compact('pelanggan'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
            'email' => 'unique:users,email',
            'password' => 'min:6',
            ],
            [
                'email.unique' => 'Email Sudah Terdaftar',
                'password.min' => 'Password Minimal 6 Karakter',
            ]
        );

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->no_hp = $request->no_hp;
        $data->save();

        if($data != null) {
            Alert::success('Success','Data Berhasil di Tambah');
            return redirect()->route('admin.pengunjung.index');
        }else {
            Alert::error('Error','Data Gagal di Tambah');
            return redirect()->route('admin.pengunjung.index');
        }
    }
    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);
        $data->name = $request->name;
        $data->no_hp = $request->no_hp;
        $data->save();
        if($data != null) {
            Alert::success('Success','Data Berhasil di Update');
            return redirect()->route('admin.pengunjung.index');
        }else {
            Alert::error('Error','Data Gagal di Update');
            return redirect()->route('admin.pengunjung.index');
        }
    }

    public function delete($id)
    {
        $data = User::findOrFail($id);
        if($data != null) {
            $data->delete();
            Alert::success('Success','Data Berhasil di Hapus');
            return redirect()->route('admin.pengunjung.index');
        }else {
            Alert::error('Error','Data Gagal di Hapus');
            return redirect()->route('admin.pengunjung.index');
        }

    }
}
