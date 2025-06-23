<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RegisterForService extends Model
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
}
