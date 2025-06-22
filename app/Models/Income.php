<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = [
        'umkm_id',
        'date',
        'total_income',
        'total_employee',
    ];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}
