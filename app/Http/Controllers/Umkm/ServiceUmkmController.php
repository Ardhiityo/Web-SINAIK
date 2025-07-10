<?php

namespace App\Http\Controllers\Umkm;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\Umkm\ServiceUmkmInterface;

class ServiceUmkmController extends Controller
{
    public function __construct(
        private ServiceUmkmInterface $serviceUmkmRepository
    ) {}

    public function index(Request $request)
    {
        $serviceUmkms = $this->serviceUmkmRepository->getServiceUmkmPaginate();
        return view('pages.umkm.service-umkm.index', compact('serviceUmkms'));
    }
}
