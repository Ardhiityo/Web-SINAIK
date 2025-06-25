<?php

namespace App\Http\Controllers\LinkProductive;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.link-productive.dashboard');
    }
}
