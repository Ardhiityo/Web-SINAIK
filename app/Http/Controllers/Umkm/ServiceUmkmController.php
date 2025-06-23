<?php

namespace App\Http\Controllers\Umkm;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\Umkm\UmkmInterface;

class ServiceUmkmController extends Controller
{
    public function __construct(private UmkmInterface $umkmRepository) {}

    public function index()
    {
        $serviceUmkms = $this->umkmRepository->getServiceUmkmPaginate();

        return view('pages.umkm.service-umkm.index', compact('serviceUmkms'));
    }
}
