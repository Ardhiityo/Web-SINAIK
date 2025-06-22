<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SectorCategoryUmkm extends Pivot
{
    protected $table = 'sector_category_umkms';

    public function sectorCategory()
    {
        return $this->belongsTo(SectorCategory::class, 'sector_category_id');
    }

    public function umkm()
    {
        return $this->belongsTo(Umkm::class, 'umkm_id');
    }
}
