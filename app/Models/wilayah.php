<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\unit_kerja;

class wilayah extends Model
{
    use HasFactory;

    /**
     * The roles that belong to the wilayah
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function unit_kerja(): BelongsToMany
    {
        return $this->belongsToMany(unit_kerjas::class);
    }
    
}
