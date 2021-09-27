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
use File;
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
    public function indexkanwil(Request $req){
        $users = $req->session()->get('status');
         if ($users === "surabaya") {
            $karyawans = karyawan::where("wilayah_id",6)->paginate(10);
            $wilayahs = wilayah::where('id','==',6)->get();
            $units = unit_kerja::where("wilayah_id",'==',6)->get(); 
        }else if ($users === "semarang") {
            $karyawans = karyawan::where("wilayah_id",5)->paginate(10);
            $wilayahs = wilayah::where('id',5)-get();
            $units = unit_kerja::where("wilayah_id",5)->get(); 
        }else if ($users === "bandung") {
            $karyawans = karyawan::where("wilayah_id",4)->paginate(10);
            $wilayahs = wilayah::where('id',4)->get();
            $units = unit_kerja::where("wilayah_id",4)->get(); 
        }else if ($users === "makassar") {
            $karyawans = karyawan::where("wilayah_id",9)->paginate(10);
            $wilayahs = wilayah::where('id',9)->get();
            $units = unit_kerja::where("wilayah_id",9)->get(); 
        }else if ($users === "pusat1") {
            $karyawans = karyawan::where("wilayah_id",1)->orWhere("wilayah_id",8)->paginate(10);
            $wilayahs = wilayah::where('id',1)->orWhere("id",8)->get();
            $units = unit_kerja::where("wilayah_id",1)->orWhere("wilayah_id",8)->get(); 
        }else if ($users === "pusat2") {
            $karyawans = karyawan::where("wilayah_id",3)->orWhere("wilayah_id",11)->orWhere("wilayah_id",12)->paginate(10);
            $wilayahs = wilayah::where('id',3)->orWhere("id",11)->orWhere("id",12)->get();
            $units = unit_kerja::where("wilayah_id",3)->orWhere("wilayah_id",11)->orWhere("wilayah_id",12)->get(); 
        }else if ($users === "pusat3") {
            $karyawans = karyawan::where("wilayah_id",2)->orWhere("wilayah_id",7)->paginate(10);
            $wilayahs = wilayah::where('id',2)->orWhere("id",7)->get();
            $units = unit_kerja::where("wilayah_id",2)->orWhere("wilayah_id",7)->get(); 
        }else if ($users === "admin") {
            $karyawans = karyawan::paginate(10);
            $wilayahs = wilayah::all();
            $units = unit_kerja::all();
       
        }
      
        
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
        $karyawans->no_npwp = $req->no_npwp;
        $karyawans->no_bpjs_ketenagakerjaan = $req->no_bpjs_ketenagakerjaan;
        $karyawans->no_bpjs_kesehatan = $req->no_bpjs_kesehatan;
        $karyawans->tanggal_lahir = $req->tanggal_lahir;
        $karyawans->wilayah_id = $req->wilayah_id;
        $karyawans->unit_kerja_id = $req->unit_kerja_id;
        $karyawans->bidang_tugas = $req->bidang_tugas;
        $karyawans->pendidikan_formal = $req->pendidikan_formal;
        $karyawans->honor = $req->honor;
        $karyawans->no_telp = $req->no_telp;
        $karyawans->jenis_kelamin = $req->jenis_kelamin;
        $karyawans->alamat_domisili = $req->alamat_domisili;
        $karyawans->alamat_ktp = $req->alamat_ktp;
        $karyawans->foto_karyawan = $req->foto_karyawan;
        $karyawans->foto_ktp = $req->foto_ktp;
        $karyawans->perjanjian_kerja = $req->perjanjian_kerja;
        $karyawans->kontrak = $req->kontrak;
        $karyawans->vaksin = $req->vaksin;
        $karyawans->no_rekening = $req->no_rekening;
        $karyawans->nama_bank = $req->nama_bank;
        $karyawans->vaksin = $req->vaksin;
        $foto = $req->file('file_ktp')->getClientOriginalName();
        $karyawans->foto_ktp = $req->file('file_ktp')->move(public_path('uploads'),$foto); 
        $foto_karyawan = $req->file('file_karyawan')->getClientOriginalName();
        $karyawans->foto_karyawan = $req->file('file_karyawan')->move(public_path('uploads'),$foto_karyawan);
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

        $karyawans = karyawan::where('nama','like',"%".$search."%")->orWhere('nama','like',"%".$search."%")->paginate();
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
    public function update(Request $req)
    {
      
        $karyawans = karyawan::where('id',$req->id)->update([
        "nama"=>$req->input('nama'),
        "nik"=>$req->input('nik'),
        "no_npwp"=>$req->input('no_npwp'),
        "no_bpjs_ketenagakerjaan"=>$req->input('no_bpjs_ketenagakerjaan'),
        "no_bpjs_kesehatan"=>$req->input('no_bpjs_kesehatan'),
        "tanggal_lahir"=>$req->input('tanggal_lahir'),
        "wilayah_id"=>$req->input('wilayah_id'),
        "unit_kerja_id"=>$req->input('unit_kerja_id'),
        "bidang_tugas"=>$req->input('bidang_tugas'),
        "pendidikan_formal"=>$req->input('pendidikan_formal'),
        "honor"=>$req->input('honor'),
        "jenis_kelamin"=>$req->input('jenis_kelamin'),
        "alamat_domisili"=>$req->input('alamat_domisili'),
        "alamat_ktp"=>$req->input('alamat_ktp'),
        "foto_karyawan"=>$req->input('foto_karyawan'),
        "foto_ktp"=>$req->input('foto_ktp'),
        "perjanjian_kerja"=>$req->input('perjanjian_kerja'),
        "kontrak"=>$req->input('kontrak'),
        "vaksin"=>$req->input('vaksin'),
        "no_rekening"=>$req->input('no_rekening'),
        "nama_bank"=>$req->input('nama_bank')
                      
    ]);
        if($karyawans){
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
        $data_ktp = substr($karyawans->foto_ktp,66);
        $data_karyawan = substr($karyawans->foto_karyawan,66);
        if ($data_ktp && $data_karyawan) {
            unlink(public_path("uploads/$data_ktp"));
        unlink(public_path("uploads/$data_karyawan"));
        $karyawans->delete();
        }   $karyawans->delete();
     
        return redirect('/karyawan');
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
