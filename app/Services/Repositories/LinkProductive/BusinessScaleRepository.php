<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\BusinessScale;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\Interfaces\LinkProductive\BusinessScaleInterface;

class BusinessScaleRepository implements BusinessScaleInterface
{
    public function getBusinessScales()
    {
        return BusinessScale::select('id', 'name')->get();
    }

    public function getBusinessScalesPaginate()
    {
        return BusinessScale::select('id', 'name')->paginate(10);
    }

    public function storeBusinessScale(array $data)
    {
        try {
            DB::beginTransaction();
            BusinessScale::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store business scale']);
        }
    }
}
