<?php

namespace App\Http\Controllers\Umkm;

use App\Models\Umkm;
use App\Http\Controllers\Controller;
use App\Services\Interfaces\Umkm\ProductInterface;
use App\Services\Interfaces\LinkProductive\UmkmInterface;

class UmkmController extends Controller
{
    public function __construct(
        private UmkmInterface $umkmRepository,
        private ProductInterface $productRepository
    ) {}

    public function index()
    {
        $umkms = $this->umkmRepository->getUmkmsPaginate();

        return view('pages.umkm.umkm.index', compact('umkms'));
    }

    public function show(Umkm $umkm)
    {
        $umkm = $this->umkmRepository->getUmkm($umkm->id);

        return view('pages.umkm.umkm.show', compact('umkm'));
    }

    public function product(Umkm $umkm)
    {
        $products = $this->umkmRepository->getUmkmProductsPaginate($umkm->id);

        $umkm->load('biodata:id,business_name,umkm_id');

        return view('pages.umkm.umkm.product.index', compact('products', 'umkm'));
    }

    public function performance(Umkm $umkm)
    {
        $performances = $this->umkmRepository->getUmkmPerformancePaginate($umkm->id);

        return view('pages.umkm.umkm.performance.index', compact('umkm', 'performances'));
    }
}
