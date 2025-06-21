<?php

namespace App\Http\Controllers\Umkm;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Umkm\StoreProductRequest;
use App\Services\Interfaces\Umkm\UmkmInterface;
use App\Http\Requests\Umkm\UpdateProductRequest;

class ProductController extends Controller
{
    public function __construct(private UmkmInterface $umkmRepository) {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->umkmRepository->getProducts();

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
        $this->umkmRepository->storeProduct($request->validated());

        return redirect()->route('umkm.products.index')->with('success', 'Product berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('pages.umkm.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $this->umkmRepository->updateProduct($request->validated(), $product);

        return redirect()->route('umkm.products.index')->with('success', 'Product berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        Storage::disk('public')->delete($product->image);

        $product->delete();

        return redirect()->route('umkm.products.index')->with('success', 'Product berhasil dihapus');
    }
}
