<?php

namespace App\Services\Umkm;

use Illuminate\Support\Facades\Cache;
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

    public function getPanelData()
    {
        $totalService = Cache::remember('totalService', 1440, function () {
            return $this->serviceUmkmRepository->getTotalServiceUmkm();
        });

        $performance = Cache::remember('performance', 1440, function () {
            return $this->incomeRepository->getTotalIncomeLatestFirst();
        });

        $totalEmployee = $performance->total_employee ?? 0;
        $totalIncome = $performance->total_income ?? 0;

        $totalSector = Cache::remember('totalSector', 1440, function () {
            return $this->sectorCategoryRepoistory->getTotalSectorCategory();
        });

        $services = $this->serviceRepository->getServicesLatest();

        return compact('totalService', 'totalEmployee', 'totalIncome', 'totalSector', 'services');
    }

    public function getStatisticData()
    {
        $performances = Cache::remember('performances', 1440, function () {
            return $this->incomeRepository->getTotalIncomeLatest();
        });

        $dates = [];
        $incomes = [];
        $employees = [];

        foreach ($performances as $key => $performance) {
            $dates[] = $performance->date->translatedFormat('F');
            $incomes[] = $performance->total_income;
            $employees[] = $performance->total_employee;
        }

        return compact('dates', 'incomes', 'employees');
    }
}
