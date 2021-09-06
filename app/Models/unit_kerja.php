<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\wilayah;

class unit_kerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'wilayah_id',
        'unit_kerja'
    ];
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    public function wilayah(): BelongsTo 
    {
        return $this->belongsTo(wilayah::class);
    }
}
