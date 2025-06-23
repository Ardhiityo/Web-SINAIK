<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $casts = [
        'is_verified' => 'boolean'
    ];

    protected $fillable = [
        'biodata_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function biodata()
    {
        return $this->hasOne(Biodata::class);
    }

    public function sectorCategories()
    {
        return $this->belongsToMany(SectorCategory::class, 'sector_category_umkm', 'umkm_id', 'sector_category_id')->withPivot('id');
    }

    public function businessScale()
    {
        return $this->belongsTo(BusinessScale::class);
    }

    public function certification()
    {
        return $this->belongsTo(Certification::class);
    }

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }
    public function serviceUmkms()
    {
        return $this->belongsToMany(Service::class, 'service_umkm', 'umkm_id', 'service_id');
    }
}
