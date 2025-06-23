<?php

namespace App\Http\Controllers\Umkm;

use App\Http\Controllers\Controller;
use App\Http\Requests\Umkm\StoreServiceRequest;
use App\Services\Interfaces\LinkProductive\ServiceInterface;
use App\Services\Interfaces\Umkm\UmkmInterface;

class ServiceController extends Controller
{
    public function __construct(
        private ServiceInterface $serviceRepository,
        private UmkmInterface $umkmRepository
    ) {}

    public function index()
    {
        $services = $this->serviceRepository->getServicesPaginate();

        return view('pages.umkm.service.index', compact('services'));
    }

    public function store(StoreServiceRequest $request)
    {
        $this->umkmRepository->storeRegisterForService($request->validated());

        return redirect()->route('umkm.services.index')->withSuccess('Pendaftaran berhasil');
    }
}
