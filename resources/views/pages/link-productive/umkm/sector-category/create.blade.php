@extends('layouts.app')

@section('title', 'Buat Sektor Kategori')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Sektor Kategori Bisnis</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Profile Bisnis</a></div>
                    <div class="breadcrumb-item"><a href="#">Produk</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Sektor Bisnis</h2>
                <p class="section-lead">
                    Informasi mengenai data sektor bisnismu
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto card">
                                    <form action="{{ route('umkm.sector-category-umkms.store') }}" method="POST">
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
                                                    <label for="sector_category_id">Sektor Kategori Bisnis</label>
                                                    <select id="sector_category_id" required name="sector_category_id"
                                                        class="form-control">
                                                        <option selected value="">Pilih...</option>
                                                        @foreach ($sectorCategories as $sectorCategory)
                                                            <option value="{{ $sectorCategory->id }}"
                                                                {{ old('sector_category_id') == $sectorCategory->id ? 'selected' : '' }}>
                                                                {{ $sectorCategory->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
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
