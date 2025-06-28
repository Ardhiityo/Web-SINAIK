<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\Service;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\Interfaces\LinkProductive\ServiceInterface;

class ServiceRepository implements ServiceInterface
{
    public function getServicesPaginate()
    {
        return Service::with('serviceCategory:id,name')
            ->select('id', 'title', 'description', 'available_date', 'end_date', 'service_category_id')
            ->paginate(10);
    }

    public function getServicesByKeyword($keyword)
    {
        $services = Service::whereFullText('title', $keyword)
            ->with('serviceCategory:id,name')
            ->select('id', 'title', 'description', 'available_date', 'end_date', 'service_category_id')
            ->paginate(10);

        if ($services->isEmpty()) {
            return Service::whereLike('title', $keyword)
                ->with('serviceCategory:id,name')
                ->select('id', 'title', 'description', 'available_date', 'end_date', 'service_category_id')
                ->paginate(10);
        }

        return $services;
    }

    public function getServicesLatest()
    {
        return Service::select('id', 'title', 'description', 'created_at')
            ->orderByDesc('id')
            ->limit(5)
            ->get();
    }

    public function storeService($data)
    {
        try {
            DB::beginTransaction();
            Service::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store service']);
        }
    }

    public function getTotalService()
    {
        return Service::count();
    }
}
