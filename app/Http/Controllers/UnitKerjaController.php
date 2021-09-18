<?php

namespace App\Http\Controllers;

use App\Models\unit_kerja;
use Excel;
use App\Imports\UnitKerjaimport;
use Illuminate\Http\Request;

class UnitKerjaController extends Controller
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
    public function create()
    {
        //
    }

    public function  importFileUnit(Request $request){
        Excel::import(new UnitKerjaimport,$request->file);
        return "record are imported";
     }

     public function loadUnits($wilayahId)
     {
         $units = unit_kerja::where('wilayah_id','=',$wilayahId)->get(['id','unit_kerja']);
         return response()->json($units);
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
     * @param  \App\Models\unit_kerja  $unit_kerja
     * @return \Illuminate\Http\Response
     */
    public function show(unit_kerja $unit_kerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\unit_kerja  $unit_kerja
     * @return \Illuminate\Http\Response
     */
    public function edit(unit_kerja $unit_kerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\unit_kerja  $unit_kerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, unit_kerja $unit_kerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\unit_kerja  $unit_kerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(unit_kerja $unit_kerja)
    {
        //
    }
}
