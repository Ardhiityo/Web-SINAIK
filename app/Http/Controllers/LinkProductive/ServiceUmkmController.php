<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\ServiceUmkm;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkProductive\UpdateServiceUmkmRequest;
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

    public function edit(ServiceUmkm $serviceUmkm)
    {
        return view('pages.link-productive.service-umkm.edit', compact('serviceUmkm'));
    }

    public function update(UpdateServiceUmkmRequest $request, ServiceUmkm $serviceUmkm)
    {
        $serviceUmkm->update($request->validated());

        return redirect()->route('link-productive.service-umkms.index')->with('success', 'Berhasil diubah');
    }
}
