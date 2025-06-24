@extends('layouts.app')

@section('title', 'Buat Produk')

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
                <h2 class="section-title">Produkmu</h2>
                <p class="section-lead">
                    Informasi mengenai data produkmu bisnismu
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto card">
                                    <form action="{{ route('umkm.products.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-header">
                                            <h4>Buat Data</h4>
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
                                                    <input required type="file" class="form-control" name="image"
                                                        id="image">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="name">Nama Produk</label>
                                                    <input required type="name" class="form-control" id="name"
                                                        placeholder="Nama Produkmu..." name="name"
                                                        value="{{ old('name') }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="description">Deskripsi Produk</label>
                                                    <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="price">Harga</label>
                                                    <input required type="number" class="form-control" id="price"
                                                        name="price" value="{{ old('price') }}">
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
