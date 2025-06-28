<?php

namespace App\Http\Controllers\Umkm;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Umkm\StoreProductRequest;
use App\Http\Requests\Umkm\UpdateProductRequest;
use App\Services\Interfaces\Umkm\ProductInterface;

class ProductController extends Controller
{
    public function __construct(
        private ProductInterface $productRepository
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productRepository->getProducts();

        return view('pages.umkm.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.umkm.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $this->productRepository->storeProduct($request->validated());

        return redirect()->route('umkm.products.index')->with('success', 'Product berhasil disimpan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $this->authorize('update', $product);

        return view('pages.umkm.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->productRepository->updateProduct($request->validated(), $product);

        return redirect()->route('umkm.products.index')->with('success', 'Product berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);

        Storage::disk('public')->delete($product->image);

        $product->delete();

        return redirect()->route('umkm.products.index')->with('success', 'Product berhasil dihapus');
    }
}
