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

    protected $casts = [
        'date' => 'date'
    ];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}
