<?php

namespace App\Http\Controllers;
use App\Models\karyawan;
use Illuminate\Http\Request;

class TampilController extends Controller
{
    public function register_page(){
        return view('register');
    }
    public function login_page(){
        if (!session()->has('LoggedUser')) {
            return view('login');
        }else {
            return back();
        }
    }
    public function dashboard_admin(){
        return view('admin.dashboard');
    }
    public function dashboard_surabaya(){
        return view('surabaya.dashboard');
    }
    public function index(){
        return view('inputkaryawan');
    }
    public function tambah(){
        return view('inputkaryawan');
    }

    public function formwilayah(){
        return view('inputwilayah');
    }

    public function indexunit(){
        return view('inputunitkerja');
    }
    public function formtambah()
    {
        return view('admin.karyawan.tambah');
    }
   

}
