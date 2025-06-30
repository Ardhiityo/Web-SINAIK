<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'title',
        'description',
        'available_date',
        'end_date',
        'service_category_id'
    ];

    protected $casts = [
        'available_date' => 'date',
        'end_date' => 'date'
    ];

    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function serviceUmkms()
    {
        return $this->belongsToMany(Umkm::class, 'service_umkm', 'service_id', 'umkm_id');
    }
}
