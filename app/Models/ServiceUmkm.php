<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ServiceUmkm extends Pivot
{
    protected $fillable = [
        'umkm_id',
        'register_status',
        'service_id'
    ];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
