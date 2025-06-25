<?php

namespace App\Http\Controllers\Umkm;

use App\Models\Umkm;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\Umkm\ProductInterface;

class UmkmController extends Controller
{
    public function __construct(
        private \App\Services\Interfaces\LinkProductive\UmkmInterface $umkmLinkProductiveRepository,
        private \App\Services\Interfaces\Umkm\UmkmInterface $umkmRepository,
        private ProductInterface $productRepository
    ) {}

    public function index()
    {
        $umkms = $this->umkmRepository->getUmkmsPaginate();

        return view('pages.umkm.umkm.index', compact('umkms'));
    }

    public function show(Umkm $umkm)
    {
        $umkm = $this->umkmLinkProductiveRepository->getUmkm($umkm->id);

        return view('pages.umkm.umkm.show', compact('umkm'));
    }

    public function product(Umkm $umkm)
    {
        $products = $this->umkmLinkProductiveRepository->getUmkmProductsPaginate($umkm->id);

        $umkm->load('biodata:id,business_name,umkm_id');

        return view('pages.umkm.umkm.product.index', compact('products', 'umkm'));
    }

    public function performance(Umkm $umkm)
    {
        $performances = $this->umkmLinkProductiveRepository->getUmkmPerformancePaginate($umkm->id);

        return view('pages.umkm.umkm.performance.index', compact('umkm', 'performances'));
    }
}
