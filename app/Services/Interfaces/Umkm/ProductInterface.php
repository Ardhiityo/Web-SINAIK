<?php

namespace App\Services\Interfaces\Umkm;

use App\Models\Product;

interface ProductInterface
{
    public function getProducts();
    public function storeProduct(array $data, $umkmId = null);
    public function updateProduct(array $data, Product $product);
}
