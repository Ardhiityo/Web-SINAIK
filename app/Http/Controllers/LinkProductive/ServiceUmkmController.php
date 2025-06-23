<?php

namespace App\Http\Controllers\LinkProductive;

use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\LinkProductive\ServiceUmkmInterface;

class ServiceUmkmController extends Controller
{
    public function __construct(
        private ServiceUmkmInterface $serviceUmkmRepository
    ) {}

    public function index()
    {
        $serviceUmkms = $this->serviceUmkmRepository->getServiceUmkmsPaginate();

        return view('pages.link-productive.service-umkm.index', compact('serviceUmkms'));
    }
}
