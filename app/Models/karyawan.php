<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class karyawan extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'nik',
        'wilayah_id',
        'unit_kerja_id',
        'bidang_tugas',
        'honor',
        'no_telp',
        'alamat',
        'perjanjian_kerja'
    ];
    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

      /**
         * Get the wilayah that owns the karyawan
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
         */
        public function karyawan(): BelongsTo
        {
            return $this->belongsTo(karyawan::class, 'wilayah_id', 'id');
        }
    


}
