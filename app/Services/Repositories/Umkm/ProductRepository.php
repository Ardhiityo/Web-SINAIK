<?php

namespace App\Services\Repositories\Umkm;

use App\Models\Product;
use App\Services\Interfaces\Umkm\ProductInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductRepository implements ProductInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
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

    public function storeProduct(array $data, $umkmId = null)
    {
        try {
            DB::beginTransaction();
            $user = Auth::user();
            if (is_null($umkmId)) {
                $data['umkm_id'] = $user->umkm->id;
            } else {
                $data['umkm_id'] = $umkmId;
            }
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
}
