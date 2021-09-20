<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class AuthUserController extends Controller
{
    public function create(Request $req){
        // return $req->input();
        $req->validate([
                'name'=>'required',
                'email'=>'required|email|unique:users',
                'status'=>'required',
                'password'=>'required|min:5|max:20'
        ]);
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->status = $req->status;
        $user->password = Hash::make($req->password);
        // $user->remember_token = Str::random(30);
        $query = $user->save();

        if ($query) {
            return back()->with('success','kamu berhasil sukses');

        }else{
            return back()->with('fail','data tidak berhasil registrasi');
        }
    }

    public function check(Request $req){
    //    return $req->input();
        $req->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);
        $users = User::all()->where('email','=',$req->email)->first();
        if ($users) {
            if (Hash::check($req->password,$users->password)) {
                $req->session()->put('LoggedUser',$users->id);
                $req->session()->put('status',$users->status);
                if ($users->status === 'admin') {
                    return redirect('admin/dashboard');
                }if ($users->status === 'keuangan' && $users->status === 'bisnis' ) {
                    return redirect('/dashboard');  
                }if ($users->status === 'surabaya' ) {
                    return redirect('surabaya/dashboard');  
                }if ($users->status === 'bandung' ) {
                    return redirect('bandung/dashboard');  
                }if ($users->status === 'semarang' ) {
                    return redirect('semarang/dashboard');  
                }if ($users->status === 'makassar' ) {
                    return redirect('makassar/dashboard');  
                }else {
                    return back()->with('fail','status tidak ditemukan');
                }
                // return redirect('admin/dashboard');
            }else {
                return back()->with('success','password salah');
            }   
           
        }else {
            return back()->with('fail','user tidak ditemukan');
        }
    }

    public function logout(){
       if (session()->has('LoggedUser')) {
          session()->pull('LoggedUser');
          return redirect('/');   
       }
    }
}
