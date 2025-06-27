<?php

namespace App\Http\Controllers\Umkm;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\Umkm\DashboardService;

class DashboardController extends Controller
{
    public function __construct(private DashboardService $dashboardService) {}

    public function index()
    {
        $panelData = $this->dashboardService->getTotalPanel();
        $statisticData = $this->dashboardService->getTotalStatistic();

        return view('pages.umkm.dashboard', $panelData, $statisticData);
    }
}
