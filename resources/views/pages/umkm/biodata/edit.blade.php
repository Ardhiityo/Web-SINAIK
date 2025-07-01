@extends('layouts.app')

@section('title', 'Edit Biodata')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Biodata Bisnis</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Profile Bisnis</a></div>
                    <div class="breadcrumb-item"><a href="#">Biodata</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Biodatamu</h2>
                <p class="section-lead">
                    Informasi mengenai data biodatamu bisnismu
                </p>
                <div class="row">
                    <div class="my-4 col-6">
                        <a href="{{ route('umkm.biodatas.index') }}" class="btn btn-primary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto card">
                                    <form action="{{ route('umkm.biodatas.update', ['biodata' => $biodata->id]) }}"
                                        method="POST">
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
                                                    <label for="business_name">Nama Bisnis</label>
                                                    <input required type="name" class="form-control" id="business_name"
                                                        placeholder="Nama Bisnismu..." name="business_name"
                                                        value="{{ old('business_name', $biodata->business_name) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="business_description">Deskripsi Bisnis</label>
                                                    <textarea name="business_description" class="form-control">{{ old('business_description', $biodata->business_description) }}</textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="business_scale_id">Skala Bisnis</label>
                                                    <select id="business_scale_id" required name="business_scale_id"
                                                        class="form-control">
                                                        <option selected value="">Pilih...</option>
                                                        @foreach ($businessScales as $businessScale)
                                                            <option value="{{ $businessScale->id }}"
                                                                {{ old('business_scale_id', $biodata->business_scale_id) == $businessScale->id ? 'selected' : '' }}>
                                                                {{ $businessScale->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="certification_id">Sertifikasi Bisnis</label>
                                                    <select id="certification_id" required name="certification_id"
                                                        class="form-control">
                                                        <option selected value="">Pilih...</option>
                                                        @foreach ($certifications as $certification)
                                                            <option value="{{ $certification->id }}"
                                                                {{ old('certification_id', $biodata->certification_id) == $certification->id ? 'selected' : '' }}>
                                                                {{ $certification->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="founding_year">Tahun Berdiri</label>
                                                    <input required type="date" class="form-control" id="founding_year"
                                                        name="founding_year"
                                                        value="{{ old('founding_year', $biodata->founding_year->format('Y-m-d')) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="city">Kota</label>
                                                    <input required type="text" class="form-control" id="city"
                                                        name="city" value="{{ old('city', $biodata->city) }}"
                                                        placeholder="Cilegon">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="province">Provinsi</label>
                                                    <input required type="text" class="form-control" id="province"
                                                        name="province" value="{{ old('province', $biodata->province) }}"
                                                        placeholder="Banten">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="address">Alamat Lengkap</label>
                                                    <textarea name="address" class="form-control" rows="10" cols="50">{{ old('address', $biodata->address) }}</textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="phone_number">Telepon</label>
                                                    <input required type="text" class="form-control" id="phone_number"
                                                        name="phone_number"
                                                        value="{{ old('phone_number', $biodata->phone_number) }}"
                                                        placeholder="08xxxxxxxxx">
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
