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
             'wilayah_id'=>$row['wilayah_id'],
             'unit_kerja_id'=>$row['unit_kerja_id'],
             'bidang_tugas'=>$row['bidang_tugas'],
             'honor'=>$row['honor'],
             'no_telp'=>$row['no_telp'],
             'alamat'=>$row['alamat'],
             'perjanjian_kerja'=>$row['perjanjian_kerja'],
        ]);
    }
}
