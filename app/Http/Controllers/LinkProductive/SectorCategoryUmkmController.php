<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\Umkm;
use Illuminate\Http\Request;
use App\Models\SectorCategoryUmkm;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Umkm\UpdateSectorCategoryUmkmRequest;
use App\Services\Interfaces\LinkProductive\SectorCategoryInterface;
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

        return view('pages.link-productive.umkm.sector-category.index', compact('sectorCategories'));
    }

    public function edit(Umkm $umkm, SectorCategoryUmkm $sectorCategoryUmkm)
    {
        $sectorCategories = $this->sectorCategoryRepository->getSectorCategories();

        return view('pages.link-productive.umkm.sector-category.edit', compact('sectorCategoryUmkm', 'sectorCategories'));
    }

    public function update(UpdateSectorCategoryUmkmRequest $request, Umkm $umkm)
    {
        //
    }
}
