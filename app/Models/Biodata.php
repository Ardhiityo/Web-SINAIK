<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    public function umkm()
    {
        return $this->hasOne(Umkm::class);
    }
}
