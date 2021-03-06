<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil');
    }

    public function update(Request $request)
    {
        $data = User::findOrFail(Auth::user()->id);
        $data->name = $request->name;
        $data->no_hp = $request->no_hp;
        $data->save();

        if($data != null) {
            Alert::success('Success','Data Berhasil di Update');
            return redirect()->route('profile.index');
        }else {
            Alert::error('Error','Data Gagal di Update');
            return redirect()->route('profile.index');
        }
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'oldPassword' => 'required',
            'password' => 'required|confirmed',

            ]);

            if(!(Hash::check($request->get('oldPassword'), Auth::user()->password))){
                Alert::error('Error','Password Lama Anda Salah');
                return redirect()->route('profile.index');

            }

            if(strcmp($request->get('oldPassword'), $request->get('password')) == 0){
                Alert::error('Error','Password Lama Anda Tidak Boleh Sama Dengan Password Baru');
                return redirect()->route('profile.index');
            }

            $user = Auth::user();
            $user->password = bcrypt($request->get('password'));
            $user->save();

            Alert::success('Success','Password Anda Berhasil di Ganti');
            return redirect()->route('profile.index');
    }
}
