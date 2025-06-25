<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $fillable = [
        'subject',
        'message',
        'umkm_id'
    ];

    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}
