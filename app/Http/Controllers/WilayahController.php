<?php

namespace App\Http\Controllers;

use App\Models\wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $req->validate([
            "wilayah"=>"required"
        ]);
        $wilayah = new wilayah;
        $wilayah->wilayah = $req->wilayah;
        $query = $wilayah->save();
        if ($query) {
            return redirect('admin/formwilayah');
        }else {
            return back('tambah_wilayah')->with('fail','data tidak berhasil ditambahkan');
            
        }
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
     * @param  \App\Models\wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function show(wilayah $wilayah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function edit(wilayah $wilayah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, wilayah $wilayah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\wilayah  $wilayah
     * @return \Illuminate\Http\Response
     */
    public function destroy(wilayah $wilayah)
    {
        //
    }
}
