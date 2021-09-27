<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\TampilController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\UnitKerjaController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[TampilController::class,'login_page']);
Route::get('/register',[TampilController::class,'register_page']);
Route::get('/wilayah',[TampilController::class,'register_page']);
Route::post('create',[AuthUserController::class,'create'])->name('auth.create');
Route::post('check',[AuthUserController::class,'check'])->name('auth.check');
Route::get('/tambah',[TampilController::class,'index']);
Route::post('/import',[KaryawanController::class,'importFile'])->name('import.karyawan');
Route::get('/tambahunit',[TampilController::class,'indexunit']);
Route::post('/importunit',[UnitKerjaController::class,'importFileUnit'])->name('import.unit');

Route::get('admin/formwilayah',[TampilController::class,'formwilayah']);
Route::post('tambah',[WilayahController::class,'create'])->name('tambah.wilayah');

Route::middleware(['isLogged'])->group(function () {
    // Admin Dasgboard
    Route::get('/dashboard',[TampilController::class,'dashboard_admin']);
    Route::get('/karyawan',[KaryawanController::class,'indexkanwil']);
    Route::get('/karyawan/search/',[KaryawanController::class,'show'],function(Request $request){
        $token = $request->session()->token();

        $token = csrf_token();
    })->name('search.karyawan');
    Route::get('/karyawan/tambah',[KaryawanController::class,'formtambah']);
    Route::post('/karyawan/tambah',[KaryawanController::class,'create'])->name('proses.tambah');
    Route::get('/karyawan/edit/{id}',[KaryawanController::class,'formedit'])->name('edit.karyawan');
    Route::post('/karyawan/update',[KaryawanController::class,'update'])->name('proses.update');
    Route::delete('/karyawan/delete/{id}',[KaryawanController::class,'destroy'])->name('delete.karyawan');

    // cetak pdf
    Route::get('admin/karyawan/pdf/{id}',[KaryawanController::class,'cetak_pdf'])->name('cetak.karyawan');
    // wilayah
    Route::get('/admin/wilayah',[WilayahController::class,'index']);
// Surabaya dashboard
Route::get('surabaya/dashboard',[TampilController::class,'dashboard_admin']);
Route::get('/logout',[AuthUserController::class,'logout']);




});
Route::group(['prefix' => 'units'], function()
{
    Route::get('/{wilayahId}',[UnitKerjaController::class,'loadunits']);
});


