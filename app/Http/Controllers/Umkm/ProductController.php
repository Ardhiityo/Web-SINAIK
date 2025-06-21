<?php

namespace App\Http\Controllers\Umkm;

use App\Models\Product;
use App\Services\Interfaces\Umkm\UmkmInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Umkm\StoreProductRequest;

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('umkm.products.index')->with('success', 'Product berhasil dihapus');
    }
}
