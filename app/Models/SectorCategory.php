<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectorCategory extends Model
{
    protected $fillable = [
        'name'
    ];

    public function umkms()
    {
        return $this->belongsToMany(Umkm::class, 'sector_category_umkm', 'sector_category_id', 'umkm_id')->withPivot('id');
    }
}
