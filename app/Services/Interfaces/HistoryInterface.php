<?php

namespace App\Services\Interfaces;

interface HistoryInterface
{
    public function destroyHistories();
    public function storeHistory($keyword);
    public function getHistories();
}
