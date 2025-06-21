<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    public function biodata()
    {
        return $this->hasOne(Biodata::class);
    }
}
