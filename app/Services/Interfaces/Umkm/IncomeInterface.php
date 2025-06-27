<?php

namespace App\Services\Interfaces\Umkm;

interface IncomeInterface
{
    public function getIncomesPaginate();
    public function storeIncome(array $data, $umkmId = null);
    public function getTotalIncomeLatestFirst();
    public function getTotalIncomeLatest();
}
