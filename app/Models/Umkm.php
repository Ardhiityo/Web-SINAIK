<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $fillable = [
        'biodata_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function biodata()
    {
        return $this->belongsTo(Biodata::class);
    }

    public function sectorCategories()
    {
        return $this->belongsToMany(SectorCategory::class, 'sector_category_umkms', 'umkm_id', 'sector_category_id');
    }

    public function businessScale()
    {
        return $this->belongsTo(BusinessScale::class);
    }

    public function certification()
    {
        return $this->belongsTo(Certification::class);
    }
}
