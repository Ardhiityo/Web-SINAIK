<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\Umkm;
use App\Models\SectorCategoryUmkm;
use App\Http\Controllers\Controller;
use App\Http\Requests\Umkm\StoreSectorCategoryUmkmRequest;
use App\Services\Interfaces\LinkProductive\SectorCategoryInterface;
use App\Http\Requests\LinkProductive\UpdateSectorCategoryUmkmRequest;
use App\Services\Interfaces\LinkProductive\SectorCategoryUmkmInterface;

class SectorCategoryUmkmController extends Controller
{
    public function __construct(
        private SectorCategoryUmkmInterface $sectorCategoryUmkmRepository,
        private SectorCategoryInterface $sectorCategoryRepository
    ) {}

    public function index(Umkm $umkm)
    {
        $sectorCategories = $this->sectorCategoryUmkmRepository->getSectorCategoriesPaginate($umkm);

        return view('pages.link-productive.umkm.sector-category.index', compact('sectorCategories', 'umkm'));
    }

    public function edit(Umkm $umkm, SectorCategoryUmkm $sectorCategoryUmkm)
    {
        $sectorCategories = $this->sectorCategoryRepository->getSectorCategories();

        return view('pages.link-productive.umkm.sector-category.edit', compact('sectorCategoryUmkm', 'sectorCategories', 'umkm'));
    }

    public function create(Umkm $umkm)
    {
        $sectorCategories = $this->sectorCategoryRepository->getSectorCategories();

        return view('pages.link-productive.umkm.sector-category.create', compact('umkm', 'sectorCategories'));
    }

    public function store(StoreSectorCategoryUmkmRequest $request, Umkm $umkm)
    {
        $this->sectorCategoryUmkmRepository->storeSectorCategory($request->validated(), $umkm->id);

        return redirect()->route('link-productive.umkms.sector-category-umkm.index', ['umkm' => $umkm->id])->withSuccess('Berhasil disimpan');
    }

    public function update(UpdateSectorCategoryUmkmRequest $request, Umkm $umkm, SectorCategoryUmkm $sector_category_umkm)
    {
        $sector_category_umkm->update($request->validated());

        return redirect()->route('link-productive.umkms.sector-category-umkm.index', ['umkm' => $umkm->id])->withSuccess('Berhasil diupdate');
    }

    public function destroy(Umkm $umkm, SectorCategoryUmkm $sectorCategoryUmkm)
    {
        $sectorCategoryUmkm->delete();

        return redirect()->route('link-productive.umkms.sector-category-umkm.index', ['umkm' => $umkm->id])->withSuccess('Berhasil dihapus');
    }
}
