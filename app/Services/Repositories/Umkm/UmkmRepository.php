<?php

namespace App\Services\Repositories\Umkm;

use App\Models\Biodata;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Services\Interfaces\Umkm\UmkmInterface;

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
            $data['image'] = $data['image']->store('products');
            Product::create($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::info($th->getMessage(), ['store product']);
        }
    }
}
