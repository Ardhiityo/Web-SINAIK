<?php

namespace App\Services\Repositories\Umkm;

use App\Models\Biodata;
use App\Models\Income;
use App\Models\Product;
use App\Models\RegisterForService;
use App\Models\SectorCategoryUmkm;
use App\Models\ServiceUmkm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Services\Interfaces\Umkm\UmkmInterface;

use function Laravel\Prompts\select;

class UmkmRepository implements UmkmInterface
{
    public function getBiodata()
    {
        $user = Auth::user();

        return Biodata::select(
            'id',
            'business_name',
            'business_description',
            'phone_number',
            'city',
            'province',
            'address',
            'founding_year',
            'business_scale_id',
            'certification_id',
        )
            ->where('umkm_id', $user->umkm->id)
            ->first();
    }

    public function storeBiodata(array $data)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            $data['umkm_id'] = $user->umkm->id;
            Biodata::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store biodata']);
        }
    }

    public function getProducts()
    {
        $user = Auth::user();

        return Product::select(
            'id',
            'name',
            'description',
            'price',
            'image'
        )
            ->where('umkm_id', $user->umkm->id)
            ->paginate(10);
    }

    public function storeProduct(array $data)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            $data['umkm_id'] = $user->umkm->id;
            $data['image'] = $data['image']->store('products', 'public');
            Product::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store product']);
        }
    }

    public function updateProduct(array $data, Product $product)
    {
        try {
            DB::beginTransaction();
            if (isset($data['image'])) {
                Storage::disk('public')->delete($product->image);
                $data['image'] = $data['image']->store('products', 'public');
            }
            $product->update($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['update product']);
        }
    }

    public function getIncomes()
    {
        $user = Auth::user();

        return Income::select(
            'id',
            'date',
            'total_income',
            'total_employee',
        )
            ->where('umkm_id', $user->umkm->id)
            ->paginate(10);
    }

    public function storeIncome(array $data)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            $data['umkm_id'] = $user->umkm->id;
            Income::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store income']);
        }
    }

    public function getSectorCategories()
    {
        $user = Auth::user();

        return $user->umkm->sectorCategories()->paginate(10);
    }

    public function storeSectorCategory(array $data)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            $data['umkm_id'] = $user->umkm->id;
            SectorCategoryUmkm::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store sector category']);
        }
    }

    public function getSectorCategoryById($id)
    {
        $user = Auth::user();

        return $user->umkm
            ->sectorCategories()
            ->where('sector_categories.id', $id)
            ->firstOrFail();
    }

    public function storeRegisterForService($data)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            ServiceUmkm::create([
                'umkm_id' => $user->umkm->id,
                'register_status' => 'process',
                'service_id' => $data['service_id']
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info(json_encode($th->getMessage(), JSON_PRETTY_PRINT));
        }
    }

    public function registeredServiceUmkmCheck($serviceId)
    {
        $user = Auth::user();

        return ServiceUmkm::where('umkm_id', $user->umkm->id)
            ->where('service_id', $serviceId)
            ->exists();
    }

    public function destroyServiceUmkm($serviceId)
    {
        $user = Auth::user();

        try {
            DB::beginTransaction();
            $user->umkm->serviceUmkms()->detach($serviceId);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage());
        }
    }
}
