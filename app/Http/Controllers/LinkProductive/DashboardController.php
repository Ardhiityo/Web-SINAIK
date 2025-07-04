<?php

namespace App\Http\Controllers\LinkProductive;

use App\Http\Controllers\Controller;
use App\Services\LinkProductive\DashboardService;

class DashboardController extends Controller
{
    public function __construct(private DashboardService $dashboardService) {}

    public function index()
    {
        $panelData = $this->dashboardService->getPanelData();

        $statisticData = $this->dashboardService->getStatisticData();

        return view('pages.link-productive.dashboard', $panelData, $statisticData);
    }
}
