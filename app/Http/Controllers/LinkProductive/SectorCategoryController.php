<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\SectorCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\LinkProductive\StoreSectorCategoryRequest;
use App\Http\Requests\LinkProductive\UpdateSectorCategoryRequest;
use App\Services\Interfaces\LinkProductive\SectorCategoryInterface;

class SectorCategoryController extends Controller
{
    public function __construct(private SectorCategoryInterface $sectorCategoryRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectorCategories = $this->sectorCategoryRepository->getSectorCategoriesPaginate();

        return view('pages.link-productive.sectory-category.index', compact('sectorCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.link-productive.sectory-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectorCategoryRequest $request)
    {
        $this->sectorCategoryRepository->storeSectorCategory($request->validated());

        return redirect()->route('link-productive.sector-categories.index')->with('success', 'Sukses disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SectorCategory $sectorCategory)
    {
        return view('pages.link-productive.sectory-category.edit', compact('sectorCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectorCategoryRequest $request, SectorCategory $sectorCategory)
    {
        $sectorCategory->update($request->validated());

        return redirect()->route('link-productive.sector-categories.index')->with('success', 'Sukses diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SectorCategory $sectorCategory)
    {
        $sectorCategory->delete();

        return redirect()->route('link-productive.sector-categories.index')->with('success', 'Sukses dihapus');
    }
}
