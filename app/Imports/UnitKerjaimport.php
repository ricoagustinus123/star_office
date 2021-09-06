<?php

namespace App\Imports;

use App\Models\unit_kerja;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UnitKerjaimport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new unit_kerja([
            'wilayah_id'=>$row['wilayah_id'],
            'unit_kerja'=>$row['unit_kerja']
        ]);
    }
}
