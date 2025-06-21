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
    ];

    public function umkm()
    {
        return $this->hasOne(Umkm::class);
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
