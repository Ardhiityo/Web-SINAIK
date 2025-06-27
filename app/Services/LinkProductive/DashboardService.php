<?php

namespace App\Services\LinkProductive;

use App\Models\Income;
use App\Services\Interfaces\LinkProductive\UmkmInterface;
use App\Services\Interfaces\LinkProductive\ServiceInterface;
use App\Services\Interfaces\LinkProductive\CertificationInterface;
use App\Services\Interfaces\LinkProductive\SectorCategoryInterface;

class DashboardService
{
    public function __construct(
        private ServiceInterface $serviceRepository,
        private UmkmInterface $umkmRepository,
        private SectorCategoryInterface $sectorCategoryRepository,
        private CertificationInterface $certificationRepository
    ) {}

    public function getPanelData()
    {
        $totalService = $this->serviceRepository->getTotalService();
        $totalUmkm = $this->umkmRepository->getTotalUmkm();
        $totalSectorCategory = $this->sectorCategoryRepository->getTotalSectorCategory();
        $totalCertification = $this->certificationRepository->getTotalCertification();
        $services = $this->serviceRepository->getServicesLatest();

        return compact('totalService', 'totalUmkm', 'totalSectorCategory', 'totalCertification', 'services');
    }

    public function getStatisticData()
    {
        $startMonth = now()->subMonths(4)->startOfMonth();
        $endMonth = now()->endOfMonth();
        $months = [];
        $monthsNumber = [];
        $incomes = [];
        $employees = [];

        $performances = Income::whereBetween('date', [$startMonth, $endMonth])->orderBy('date')->get();

        foreach ($performances as $key => $performance) {
            $month = $performance->date->translatedFormat('F');
            if (!in_array($month, $months)) {
                $months[] = $month;
                $monthsNumber[] = $performance->date->month;
            }
        }

        foreach ($monthsNumber as $key => $value) {
            $incomes[] = Income::whereMonth('date', $value)->sum('total_income');
            $employees[] = Income::whereMonth('date', $value)->sum('total_employee');
        }

        return compact('incomes', 'months', 'employees');
    }
}
