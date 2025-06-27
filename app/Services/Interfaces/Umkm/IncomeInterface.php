<?php

namespace App\Services\Interfaces\Umkm;

interface IncomeInterface
{
    public function getIncomes();
    public function storeIncome(array $data, $umkmId = null);
    public function getTotalIncomeLatest();
}
