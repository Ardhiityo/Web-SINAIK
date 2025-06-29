@extends('layouts.app')

@section('title', 'Edit Produk')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dukungan Umkm</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Profile Bisnis</a></div>
                    <div class="breadcrumb-item"><a href="#">Produk</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data dukungan umkm</h2>
                <p class="section-lead">
                    Buat dukungan umkm
                </p>
                <div class="row">
                    <div class="my-4 col-6">
                        <a href="{{ route('link-productive.supports.index') }}" class="btn btn-primary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto card">
                                    <form action="{{ route('link-productive.supports.store') }}" method="POST"
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
                                                    <label for="name">Subjek</label>
                                                    <input required type="name" class="form-control" id="name"
                                                        placeholder="Subject..." name="subject">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="umkm_id">Umkm</label>
                                                    <select id="umkm_id" required name="umkm_id" class="form-control">
                                                        <option selected value="">Pilih...</option>
                                                        @foreach ($umkms as $umkm)
                                                            <option value="{{ $umkm->id }}"
                                                                {{ old('umkm_id') == $umkm->id ? 'selected' : '' }}>
                                                                {{ $umkm->user->name }} -
                                                                {{ $umkm->biodata->business_name ?? '...' }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="message">Pesan</label>
                                                    <textarea required class="form-control" id="message" placeholder="Pesan..." name="message"></textarea>
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
