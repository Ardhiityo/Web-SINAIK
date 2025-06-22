<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkProductive\StoreServiceRequest;
use App\Http\Requests\LinkProductive\UpdateServiceRequest;
use App\Services\Interfaces\LinkProductive\ServiceCategoryInterface;
use App\Services\Interfaces\LinkProductive\ServiceInterface;

class ServiceController extends Controller
{
    public function __construct(
        private ServiceInterface $serviceRepository,
        private ServiceCategoryInterface $serviceCategoryRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = $this->serviceRepository->getServicesPaginate();

        return view('pages.link-productive.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $serviceCategories = $this->serviceCategoryRepository->getServiceCategories();

        return view('pages.link-productive.service.create', compact('serviceCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        $this->serviceRepository->storeService($request->validated());

        return redirect()->route('link-productive.services.index')->with('success', 'Berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        $serviceCategories = $this->serviceCategoryRepository->getServiceCategories();

        return view('pages.link-productive.service.edit', compact('service', 'serviceCategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->validated());

        return redirect()->route('link-productive.services.index')->with('success', 'Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('link-productive.services.index')->with('success', 'Berhasil dihapus');
    }
}
