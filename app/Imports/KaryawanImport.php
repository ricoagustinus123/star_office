<?php

namespace App\Imports;

use App\Models\karyawan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KaryawanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new karyawan([
             'nama'=>$row['nama'],
             'nik'=>$row['nik'],
             'no_npwp'=>$row['no_npwp'],
             'no_bpjs_ketenagakerjaan'=>$row['no_bpjs_ketenagakerjaan'],
             'no_bpjs_kesehatan'=>$row['no_bpjs_kesehatan'],
             'wilayah_id'=>$row['wilayah_id'],
             'unit_kerja_id'=>$row['unit_kerja_id'],
             'bidang_tugas'=>$row['bidang_tugas'],
             'pendidikan_formal'=>$row['pendidikan_formal'],
             'honor'=>$row['honor'],
             'no_telp'=>$row['no_telp'],
             'alamat_domisili'=>$row['alamat_domisili'],
             'alamat_ktp'=>$row['alamat_ktp'],
             'perjanjian_kerja'=>$row['perjanjian_kerja'],
             'vaksin'=>$row['vaksin'],
             'foto_ktp'=>$row['foto_ktp'],
             'foto_karyawan'=>$row['foto_karyawan'],
             'no_rekening'=>$row['no_rekening'],
             'nama_bank'=>$row['nama_bank'],
        ]);
    }
}
