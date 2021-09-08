<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use App\Models\wilayah;
use App\Models\unit_kerja;
use App\Models\User;
use App\Imports\KaryawanImport;
use Illuminate\Http\Request;
use Excel;
use PDF;
class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawans = karyawan::paginate(10);
        $wilayahs = wilayah::all();
        $units = unit_kerja::all();
        return view('admin.karyawan.index',compact('karyawans','wilayahs','units'));
        
    }
    public function indexKanwil1(Request $req){
        $users = $req->session()->get('status');
        if ($users === "admin") {
            $karyawans = karyawan::where("wilayah_id",1)->orWhere("wilayah_id",2)->orWhere("wilayah_id",3)->paginate(10); 
        }
        $wilayahs = wilayah::all();
        $units = unit_kerja::all();
        return view('admin.karyawan.index',compact('karyawans','wilayahs','units'));
        
        

    }
    public function formtambah(Request $req)
    {
        $wilayahs = wilayah::all();
        $units = unit_kerja::all();
        return view('admin.karyawan.tambah',compact('wilayahs','units'));
    }   

    public function formedit($id)
    {
        $karyawans = karyawan::all()->where('id',$id);
        $wilayahs = wilayah::all();
        $units = unit_kerja::all();
        return view('admin.karyawan.edit',compact('wilayahs','units','karyawans'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
    
  
        $karyawans= new karyawan;
        $karyawans->nama = $req->nama;
        $karyawans->nik = $req->nik;
        $karyawans->tanggal_lahir = $req->tanggal_lahir;
        $karyawans->wilayah_id = $req->wilayah_id;
        $karyawans->unit_kerja_id = $req->unit_kerja_id;
        $karyawans->bidang_tugas = $req->bidang_tugas;
        $karyawans->pendidikan_formal  = $req->pendidikan_formal;
        $karyawans->honor = $req->honor;
        $karyawans->no_telp = $req->no_telp;
        $karyawans->alamat_domisili = $req->alamat_domisili;
        $karyawans->alamat_ktp = $req->alamat_ktp;
        $karyawans->perjanjian_kerja = $req->perjanjian_kerja;
        $karyawans->vaksin = $req->vaksin;
        $foto = $req->file('file')->getClientOriginalName();
        $karyawans->foto_ktp = $req->file('file')->storeAs('uploads',$foto,'public');
        $query = $karyawans->save();
        if ($query) {
            
            return redirect('admin/karyawan');

            
        }else{
         
            return back();

        }

    }
    
    public function  importFile(Request $request){
        Excel::import(new KaryawanImport,$request->file);
        return "record are imported";
     }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {
        $search = $req->search;

        $karyawans = karyawan::where('nama','like',"%".$search."%")->paginate();
        $wilayahs = wilayah::all();
        $units = unit_kerja::all();
        return view('admin.karyawan.index',compact('wilayahs','units','karyawans'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function edit(karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, karyawan $karyawan)
    {
      
        $karyawans = new karyawan;
        $karyawans->nama = $req->nama;
        $karyawans->nik = $req->nik;
        $karyawans->tanggal_lahir = $req->tanggal_lahir;
        $karyawans->wilayah_id = $req->wilayah_id;
        $karyawans->unit_kerja_id = $req->unit_kerja_id;
        $karyawans->bidang_tugas = $req->bidang_tugas;
        $karyawans->pendidikan_formal = $req->pendidikan_formal;
        $karyawans->perjanjian_kerja = $req->perjanjian_kerja;
        $karyawans->vaksin = $req->vaksin;
        $karyawans->alamat_domisili = $req->alamat_domisili;
        $karyawans->alamat_ktp = $req->alamat_ktp;
        $query = $karyawans->save();
        if($query){
            return redirect('admin/karyawan');
        }else {
            return back();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\karyawan  $karyawan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawans = karyawan::find($id);
        $karyawans->delete();
        return redirect('admin/karyawan');
    }

    public function cetak_pdf($id)
    {

        $karyawans = karyawan::find($id);
        $wilayahs = wilayah::where('id','like',$karyawans->wilayah_id)->first();
        $unit_kerjas = unit_kerja::where('id','like',$karyawans->unit_kerja_id)->first();
        $datas= [
        'foto' => "asset('images/logo.png')",
        'nama' => $karyawans->nama,
        'nik' => $karyawans->nik,
        'tanggal_lahir' => $karyawans->tanggal_lahir,
        'wilayah' => $wilayahs->wilayah,
        'unit_kerja' => $unit_kerjas->unit_kerja,
        'bidang_tugas' => $karyawans->bidang_tugas,
        'no_telp' => $karyawans->no_telp,
        'alamat' => $karyawans->alamat,
        'perjanjian_kerja' => $karyawans->perjanjian_kerja,
        'vaksin' => $karyawans->vaksin,
    ];
      
    $pdf = PDF::loadView('admin.karyawan.pdf_view',$datas);

    return $pdf->download('data_karyawan.pdf');
    }
}
