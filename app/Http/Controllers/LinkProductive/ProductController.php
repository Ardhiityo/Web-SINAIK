<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\Umkm;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Umkm\StoreProductRequest;
use App\Http\Requests\Umkm\UpdateProductRequest;
use App\Services\Interfaces\Umkm\ProductInterface;
use App\Services\Interfaces\LinkProductive\UmkmInterface;

class ProductController extends Controller
{
    public function __construct(
        private UmkmInterface $UmkmRepository,
        private ProductInterface $productRepository
    ) {}

    public function index(Umkm $umkm)
    {
        $products = $this->UmkmRepository->getUmkmProductsPaginate($umkm->id);

        $umkm->load('biodata:id,business_name,umkm_id');

        return view('pages.link-productive.umkm.product.index', compact('products', 'umkm'));
    }

    public function create(Umkm $umkm)
    {
        $umkm->load('biodata:id,business_name,umkm_id');

        return view('pages.link-productive.umkm.product.create', compact('umkm'));
    }

    public function store(StoreProductRequest $request, Umkm $umkm)
    {
        $this->productRepository->storeProduct($request->validated(), $umkm->id);

        return redirect()->route('link-productive.umkms.product.index', ['umkm' => $umkm->id])->with('success', 'Product berhasil ditambahkan');
    }

    public function edit(Umkm $umkm, Product $product)
    {
        $umkm->load('biodata:id,business_name,umkm_id');

        return view('pages.link-productive.umkm.product.edit', compact('umkm', 'product'));
    }

    public function update(UpdateProductRequest $request, Umkm $umkm, Product $product)
    {
        $this->productRepository->updateProduct($request->validated(), $product);

        return redirect()->route('link-productive.umkms.product.index', ['umkm' => $umkm->id])->with('success', 'Product berhasil diupdate');
    }

    public function destroy(Umkm $umkm, Product $product)
    {
        Storage::disk('public')->delete($product->image);

        $product->delete();

        return redirect()->route('link-productive.umkms.product.index', ['umkm' => $umkm->id])->with('success', 'Product berhasil dihapus');
    }
}
