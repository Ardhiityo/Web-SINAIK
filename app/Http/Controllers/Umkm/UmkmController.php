<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;

class UmkmController extends Controller
{
    public function verification()
    {
        return view('pages.umkm.verification.index');
    }
}
