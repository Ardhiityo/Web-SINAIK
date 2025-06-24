<?php

namespace App\Http\Controllers\Umkm;

use App\Models\SectorCategoryUmkm;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\Umkm\UmkmInterface;
use App\Http\Requests\Umkm\StoreSectorCategoryUmkmRequest;
use App\Http\Requests\Umkm\UpdateSectorCategoryUmkmRequest;

class SectorCategoryUmkmController extends Controller
{
    public function __construct(
        private UmkmInterface $umkmRepository,
        private \App\Services\Interfaces\LinkProductive\SectorCategoryInterface $sectorCategoryLinkProductiveRepository,
        private \App\Services\Interfaces\Umkm\SectorCategoryInterface $sectorCategoryRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sectorCategories = $this->sectorCategoryRepository->getSectorCategories();

        return view('pages.umkm.sectory-category.index', compact('sectorCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sectorCategories = $this->sectorCategoryLinkProductiveRepository->getSectorCategories();

        return view('pages.umkm.sectory-category.create', compact('sectorCategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSectorCategoryUmkmRequest $request)
    {
        $this->sectorCategoryRepository->storeSectorCategory($request->validated());

        return redirect()->route('umkm.sector-category-umkms.index')
            ->with('success', 'Sektor kategori berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SectorCategoryUmkm $sectorCategoryUmkm)
    {
        $sectorCategoryLists = $this->sectorCategoryLinkProductiveRepository->getSectorCategories();

        return view('pages.umkm.sectory-category.edit', compact('sectorCategoryUmkm', 'sectorCategoryLists'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSectorCategoryUmkmRequest $request, SectorCategoryUmkm $sectorCategoryUmkm)
    {
        $sectorCategoryUmkm->update($request->validated());

        return redirect()->route('umkm.sector-category-umkms.index')
            ->with('success', 'Sektor kategori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SectorCategoryUmkm $sectorCategoryUmkm)
    {
        $sectorCategoryUmkm->delete();

        return redirect()->route('umkm.sector-category-umkms.index')
            ->with('success', 'Sektor kategori berhasil dihapus');
    }
}
