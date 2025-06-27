<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;
use App\Services\Umkm\DashboardService;

class DashboardController extends Controller
{
    public function __construct(private DashboardService $dashboardService) {}

    public function index()
    {
        $panelData = $this->dashboardService->getPanelData();
        $statisticData = $this->dashboardService->getStatisticData();

        return view('pages.umkm.dashboard', $panelData, $statisticData);
    }
}
