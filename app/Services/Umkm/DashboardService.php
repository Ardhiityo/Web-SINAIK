<?php

namespace App\Services\Umkm;

use Illuminate\Support\Facades\Log;
use App\Services\Interfaces\Umkm\IncomeInterface;
use App\Services\Interfaces\Umkm\ServiceUmkmInterface;
use App\Services\Interfaces\Umkm\SectorCategoryInterface;

class DashboardService
{
    public function __construct(
        private ServiceUmkmInterface $serviceUmkmRepository,
        private IncomeInterface $incomeRepository,
        private SectorCategoryInterface $sectorCategoryRepoistory
    ) {}

    public function getTotalPanel()
    {
        $totalService = $this->serviceUmkmRepository->getTotalServiceUmkm();
        $performance = $this->incomeRepository->getTotalIncomeLatest();
        $totalEmployee = $performance->total_employee;
        $totalIncome = $performance->total_income;
        $totalSector = $this->sectorCategoryRepoistory->getTotalSectorCategory();

        return compact('totalService', 'totalEmployee', 'totalIncome', 'totalSector');
    }
}
