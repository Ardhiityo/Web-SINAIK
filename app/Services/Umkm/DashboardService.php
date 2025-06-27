<?php

namespace App\Services\Umkm;

use Illuminate\Support\Facades\Log;
use App\Services\Interfaces\Umkm\IncomeInterface;
use App\Services\Interfaces\Umkm\ServiceUmkmInterface;
use App\Services\Interfaces\Umkm\SectorCategoryInterface;
use App\Services\Interfaces\LinkProductive\ServiceInterface;

class DashboardService
{
    public function __construct(
        private ServiceUmkmInterface $serviceUmkmRepository,
        private IncomeInterface $incomeRepository,
        private SectorCategoryInterface $sectorCategoryRepoistory,
        private ServiceInterface $serviceRepository
    ) {}

    public function getTotalPanel()
    {
        $totalService = $this->serviceUmkmRepository->getTotalServiceUmkm();
        $performance = $this->incomeRepository->getTotalIncomeLatestFirst();
        $totalEmployee = $performance->total_employee;
        $totalIncome = $performance->total_income;
        $totalSector = $this->sectorCategoryRepoistory->getTotalSectorCategory();
        $services = $this->serviceRepository->getServicesLatest();

        return compact('totalService', 'totalEmployee', 'totalIncome', 'totalSector', 'services');
    }

    public function getTotalStatistic()
    {
        $performances = $this->incomeRepository->getTotalIncomeLatest();
        $dates = [];
        $incomes = [];
        $employees = [];

        foreach ($performances as $key => $performance) {
            $dates[] = $performance->date;
            $incomes[] = $performance->total_income;
            $employees[] = $performance->total_employee;
        }

        return compact('dates', 'incomes', 'employees');
    }
}
