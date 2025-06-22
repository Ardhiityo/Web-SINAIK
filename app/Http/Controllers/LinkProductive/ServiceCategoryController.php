<?php

namespace App\Http\Controllers\LinkProductive;

use App\Http\Controllers\Controller;
use App\Http\Requests\LinkProductive\StoreServiceCategoryRequest;
use App\Services\Interfaces\LinkProductive\ServiceCategoryInterface;

class ServiceCategoryController extends Controller
{
    public function __construct(private ServiceCategoryInterface $serviceCategoryRepoistory) {}

    public function index()
    {
        $serviceCategories = $this->serviceCategoryRepoistory->getServiceCategories();

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
}
