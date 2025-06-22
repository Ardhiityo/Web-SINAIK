<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkProductive\StoreServiceCategoryRequest;
use App\Http\Requests\LinkProductive\UpdateServiceCategoryRequest;
use App\Services\Interfaces\LinkProductive\ServiceCategoryInterface;

class ServiceCategoryController extends Controller
{
    public function __construct(private ServiceCategoryInterface $serviceCategoryRepoistory) {}

    public function index()
    {
        $serviceCategories = $this->serviceCategoryRepoistory->getServiceCategoriesPaginate();

        return view('pages.link-productive.service-category.index', compact('serviceCategories'));
    }

    public function create()
    {
        return view('pages.link-productive.service-category.create');
    }

    public function store(StoreServiceCategoryRequest $request)
    {
        $this->serviceCategoryRepoistory->storeServiceCategory($request->validated());

        return redirect()->route('link-productive.service-categories.index')->with('success', 'Berhasil disimpan');
    }

    public function edit(ServiceCategory $serviceCategory)
    {
        return view('pages.link-productive.service-category.edit', compact('serviceCategory'));
    }

    public function update(UpdateServiceCategoryRequest $request, ServiceCategory $serviceCategory)
    {
        $serviceCategory->update($request->validated());

        return redirect()->route('link-productive.service-categories.index')->with('success', 'Berhasil diupdate');
    }

    public function destroy(ServiceCategory $serviceCategory)
    {
        $serviceCategory->delete();

        return redirect()->route('link-productive.service-categories.index')->with('success', 'Berhasil dihapus');
    }
}
