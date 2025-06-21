<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectorCategory extends Model
{
    public function umkms()
    {
        return $this->belongsToMany(Umkm::class, 'sector_category_umkms', 'sector_category_id', 'umkm_id');
    }
}
