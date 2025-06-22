<?php

namespace App\Services\Repositories\LinkProductive;

use App\Models\ServiceCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\Interfaces\LinkProductive\ServiceCategoryInterface;

class ServiceCategoryRepository implements ServiceCategoryInterface
{
    public function getServiceCategories()
    {
        return ServiceCategory::select('id', 'name')->get();
    }

    public function getServiceCategoriesPaginate()
    {
        return ServiceCategory::select('id', 'name')->paginate(10);
    }

    public function storeServiceCategory(array $data)
    {
        try {
            DB::beginTransaction();
            ServiceCategory::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store service category']);
        }
    }
}
