<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.umkm.dashboard');
    }
}
