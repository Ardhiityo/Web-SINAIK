<?php

namespace App\Http\Controllers\Umkm;

use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\Umkm\StoreServiceRequest;
use App\Services\Interfaces\LinkProductive\ServiceInterface;
use App\Services\Interfaces\Umkm\ServiceUmkmInterface;

class ServiceController extends Controller
{
    public function __construct(
        private ServiceInterface $serviceRepository,
        private ServiceUmkmInterface $serviceUmkmRepository
    ) {}

    public function index()
    {
        $services = $this->serviceRepository->getServicesPaginate();

        return view('pages.umkm.service.index', compact('services'));
    }

    public function store(StoreServiceRequest $request)
    {
        $this->serviceUmkmRepository->storeServiceUmkm($request->validated());

        return redirect()->route('umkm.services.index')->withSuccess('Pendaftaran berhasil');
    }

    public function show(Service $service)
    {
        $registeredServiceCheck = $this->serviceUmkmRepository->registeredServiceUmkmCheck($service->id);

        return view('pages.umkm.service.show', compact('service', 'registeredServiceCheck'));
    }

    public function destroy(Service $service)
    {
        $this->serviceUmkmRepository->destroyServiceUmkm($service->id);

        return redirect()->route('umkm.services.index')->withSuccess('Berhasil');
    }
}
