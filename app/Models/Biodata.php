<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $fillable = [
        'business_name',
        'phone_number',
        'city',
        'province',
        'address',
        'founding_year',
        'business_description',
        'business_scale_id',
        'certification_id',
        'umkm_id'
    ];

    protected $casts = [
        'founding_year' => 'date'
    ];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
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
