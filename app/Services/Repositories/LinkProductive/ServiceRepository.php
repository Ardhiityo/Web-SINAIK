<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\Service;
use App\Services\Interfaces\LinkProductive\ServiceInterface;

class ServiceRepository implements ServiceInterface
{
    public function getServicesPaginate()
    {
        return Service::with('serviceCategory:id,name')
            ->select('id', 'title', 'description', 'available_date', 'end_date', 'service_category_id')
            ->paginate(10);
    }
}
