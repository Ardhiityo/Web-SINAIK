<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\ServiceUmkm;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceUmkmRequest;
use App\Http\Requests\LinkProductive\UpdateServiceUmkmRequest;
use App\Services\Interfaces\LinkProductive\ServiceInterface;
use App\Services\Interfaces\LinkProductive\ServiceUmkmInterface;
use App\Services\Interfaces\LinkProductive\UmkmInterface;

class ServiceUmkmController extends Controller
{
    public function __construct(
        private ServiceUmkmInterface $serviceUmkmRepository,
        private UmkmInterface $umkmRepository,
        private ServiceInterface $serviceRepository
    ) {}

    public function index()
    {
        $serviceUmkms = $this->serviceUmkmRepository->getServiceUmkmsPaginate();

        return view('pages.link-productive.service-umkm.index', compact('serviceUmkms'));
    }

    public function create()
    {
        $umkms = $this->umkmRepository->getUmkms();
        $services = $this->serviceRepository->getServices();

        return view('pages.link-productive.service-umkm.create', compact('umkms', 'services'));
    }

    public function store(StoreServiceUmkmRequest $request)
    {
        $this->serviceUmkmRepository->storeServiceUmkm($request->validated());

        return redirect()->route('link-productive.service-umkms.index')->with('success', 'Berhasil disimpan');
    }

    public function edit(ServiceUmkm $serviceUmkm)
    {
        return view('pages.link-productive.service-umkm.edit', compact('serviceUmkm'));
    }

    public function update(UpdateServiceUmkmRequest $request, ServiceUmkm $serviceUmkm)
    {
        $serviceUmkm->update($request->validated());

        return redirect()->route('link-productive.service-umkms.index')->with('success', 'Berhasil diubah');
    }

    public function destroy(ServiceUmkm $serviceUmkm)
    {
        $serviceUmkm->delete();

        return redirect()->route('link-productive.service-umkms.index')->with('success', 'Berhasil dihapus');
    }
}
