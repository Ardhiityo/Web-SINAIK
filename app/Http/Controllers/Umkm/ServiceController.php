<?php

namespace App\Http\Controllers\Umkm;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Umkm\StoreServiceRequest;
use App\Services\Interfaces\HistoryInterface;
use App\Services\Interfaces\LinkProductive\ServiceInterface;
use App\Services\Interfaces\Umkm\ServiceUmkmInterface;

class ServiceController extends Controller
{
    public function __construct(
        private ServiceInterface $serviceRepository,
        private ServiceUmkmInterface $serviceUmkmRepository,
        private HistoryInterface $historyRepository
    ) {}

    public function index(Request $request)
    {
        if ($keyword = $request->query('keyword')) {
            $this->historyRepository->storeHistory($keyword);
            $services = $this->serviceRepository->getServicesByKeyword($keyword);
        } else {
            $services = $this->serviceRepository->getServicesPaginate();
        }

        return view('pages.umkm.service.index', compact('services'));
    }

    public function store(StoreServiceRequest $request)
    {
        $this->serviceUmkmRepository->storeServiceUmkm($request->validated());

        return redirect()->route('umkm.service-umkms.index')->withSuccess('Pendaftaran berhasil');
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
