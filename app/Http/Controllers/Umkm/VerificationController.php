<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;

class VerificationController extends Controller
{
    public function index()
    {
        return view('pages.umkm.verification.index');
    }
}
