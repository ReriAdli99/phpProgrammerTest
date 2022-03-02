<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if(Auth::attempt($request->only('username','password'))){  
            if(Auth()->user()->role == 'author'){
                return redirect('/dashboards')->with('success','Login Sukses !!');
            }
            return redirect('/dashboard')->with('success','Login Sukses !!');
        }
        else{
            Session::flash('gagal','Username atau Password anda salah!');
            return redirect('/login')->withInput()->with('error','Gagal Login !!');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect('/');
    }
    public function Register(Request $request)
    {
        $user = new \App\User;
        $user -> role = 'author';
        $user -> username = $request -> name;
        $user -> email = $request -> email;
        $user -> password =bcrypt($request->password);
        $user -> remember_token = Str::random(60);
        $user -> save();
        return redirect('/user')->with('alert-success','Register Berhasil, Silahkan Login');
    }
    public function index(){
        $user = \App\User::where('role','author')->get();
        return view('Admin.user')->with('user',$user);
    }
    public function edit($id){
        $user = \App\User::findOrFail($id);
        return view('Admin.edit')->with('user',$user);
    } 
    public function update(Request $request, $id)
    {   
        $user = \App\User::find($id);
        $user -> username = $request -> input ('nama');
        $user -> email = $request -> input ('email');
        $user ->save();
        return redirect('/user')->with('alert-success','Data Berhasil Diubah');
    }
    public function destroy($id)
    {
        $user = \App\User::findOrFail($id);
        $user ->delete();
        return redirect('/user')->with('alert-success','Data Berhasil Dihapus');
    }
}
