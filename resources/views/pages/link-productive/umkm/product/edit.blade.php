@extends('layouts.app')

@section('title', 'Edit Produk')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Produk Bisnis</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Profile Bisnis</a></div>
                    <div class="breadcrumb-item"><a href="#">Produk</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">{{ $umkm->biodata->business_name }}</h2>
                <p class="section-lead">
                    Buat data produk UMKM {{ $umkm->biodata->business_name }}
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto card">
                                    <form
                                        action="{{ route('link-productive.umkms.product.update', ['umkm' => $product->umkm_id, 'product' => $product->id]) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-header">
                                            <h4>Edit Data</h4>
                                        </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="image">Foto Produk</label>
                                                    <input type="file" class="form-control" name="image"
                                                        id="image">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="name">Nama Produk</label>
                                                    <input required type="name" class="form-control" id="name"
                                                        placeholder="Nama Produkmu..." name="name"
                                                        value="{{ old('name', $product->name) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="description">Deskripsi Produk</label>
                                                    <textarea name="description" class="form-control">{{ old('description', $product->description) }}</textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="price">Harga</label>
                                                    <input required type="number" class="form-control" id="price"
                                                        name="price" value="{{ old('price', $product->price) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
