@extends('layouts.app')

@section('title', 'Data Produk')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Biodata Bisnis</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Profile Bisnis</a></div>
                    <div class="breadcrumb-item"><a href="#">Produk</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Produkmu</h2>
                <p class="section-lead">
                    Informasi mengenai data produk bisnismu
                </p>

                <div class="mt-5 row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>
                                    <a href="{{ route('umkm.products.create') }}" class="btn btn-primary">Buat
                                        Produk</a>
                                </h4>
                            </div>

                            <div class="card-body">
                                @if ($products->isEmpty())
                                    <p>Kamu belum memiliki produk...</p>
                                @else
                                    <div class="overflow-auto">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Produk</th>
                                                    <th scope="col">Nama Produk</th>
                                                    <th scope="col">Deskripsi</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($products as $product)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>
                                                            <img src="{{ asset(Storage::url($product->image)) }}"
                                                                width="100" height="100" class="rounded"
                                                                alt="{{ $product->name }}">
                                                        </td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{{ $product->description }}</td>
                                                        <td>{{ $product->price }}</td>
                                                        <td>
                                                            <a href="{{ route('umkm.products.edit', ['product' => $product->id]) }}"
                                                                class="btn btn-warning">Edit</a>
                                                            <form id="form-delete"
                                                                action="{{ route('umkm.products.destroy', ['product' => $product->id]) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" id="btn-delete"
                                                                    class="btn btn-danger">Hapus</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="flex-wrap mt-5 col-12 d-flex justify-content-end">
                                    {{ $products->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
