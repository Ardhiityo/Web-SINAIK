<?php

namespace App\Services\Interfaces\Umkm;

use App\Models\Product;

interface UmkmInterface
{
    public function getBiodata();
    public function storeBiodata(array $data);
    public function getProducts();
    public function storeProduct(array $data);
    public function updateProduct(array $data, Product $product);
    public function getIncomes();
    public function storeIncome(array $data);
}
