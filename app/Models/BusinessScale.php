<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessScale extends Model
{
    protected $fillable = ['name'];

    public function biodata()
    {
        return $this->hasOne(Biodata::class);
    }
}
