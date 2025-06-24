<?php

namespace App\Http\Controllers\LinkProductive;

use App\Models\Umkm;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Umkm\UpdateProductRequest;

class ProductController extends Controller
{
    public function __construct(
        private \App\Services\Interfaces\LinkProductive\UmkmInterface $linkProductiveUmkmRepository,
        private \App\Services\Interfaces\Umkm\UmkmInterface $umkmRepository
    ) {}

    public function index(Umkm $umkm)
    {
        $products = $this->linkProductiveUmkmRepository->getUmkmProductsPaginate($umkm->id);

        return view('pages.link-productive.umkm.product.index', compact('products'));
    }

    public function edit(Umkm $umkm, Product $product)
    {
        return view('pages.link-productive.umkm.product.edit', compact('umkm', 'product'));
    }

    public function update(UpdateProductRequest $request, Umkm $umkm, Product $product)
    {
        $this->umkmRepository->updateProduct($request->validated(), $product);

        return redirect()->route('link-productive.umkms.product.index', ['umkm' => $umkm->id])->with('success', 'Product berhasil diupdate');
    }

    public function destroy(Umkm $umkm, Product $product)
    {
        Storage::disk('public')->delete($product->image);

        $product->delete();

        return redirect()->route('link-productive.umkms.product.index', ['umkm' => $umkm->id])->with('success', 'Product berhasil dihapus');
    }
}
