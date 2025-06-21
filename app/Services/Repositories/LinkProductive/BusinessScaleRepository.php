<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\BusinessScale;
use App\Services\Interfaces\LinkProductive\BusinessScaleInterface;

class BusinessScaleRepository implements BusinessScaleInterface
{
    public function getBusinessScales()
    {
        return BusinessScale::select('id', 'name')->get();
    }
}
