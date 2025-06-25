<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    public function umkm()
    {
        return $this->belongsTo(Umkm::class);
    }
}
