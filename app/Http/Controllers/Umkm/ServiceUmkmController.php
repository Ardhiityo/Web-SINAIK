<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\Umkm\ServiceUmkmInterface;

class ServiceUmkmController extends Controller
{
    public function __construct(
        private ServiceUmkmInterface $serviceUmkmRepository
    ) {}

    public function index()
    {
        $serviceUmkms = $this->serviceUmkmRepository->getServiceUmkmPaginate();

        return view('pages.umkm.service-umkm.index', compact('serviceUmkms'));
    }
}
