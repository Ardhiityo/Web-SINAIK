@extends('layouts.app')

@section('title', 'Edit Layanan')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Layanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Manajemen Layanan</a></div>
                    <div class="breadcrumb-item"><a href="#">Layanan</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data layanan</h2>
                <p class="section-lead">
                    Informasi mengenai data layanan
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto card">
                                    <form
                                        action="{{ route('link-productive.services.update', ['service' => $service->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
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
                                                    <label for="title">Judul</label>
                                                    <input required type="text" class="form-control" id="title"
                                                        placeholder="Nama Layanan..." name="title"
                                                        value="{{ old('title', $service->title) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="description">Deskripsi</label>
                                                    <textarea name="description" id="description" class="form-control" cols="30" rows="10">{{ old('description', $service->description) }}</textarea>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="available_date">Tanggal Mulai</label>
                                                    <input required type="date" class="form-control" id="available_date"
                                                        name="available_date"
                                                        value="{{ old('available_date', $service->available_date) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="end_date">Tanggal Selesai</label>
                                                    <input required type="date" class="form-control" id="end_date"
                                                        name="end_date" value="{{ old('end_date', $service->end_date) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="service_category_id">Kategori Layanan</label>
                                                    <select id="service_category_id" required name="service_category_id"
                                                        class="form-control">
                                                        <option selected value="">Pilih...</option>
                                                        @foreach ($serviceCategories as $serviceCategory)
                                                            <option value="{{ $serviceCategory->id }}"
                                                                {{ old('service_category_id', $service->service_category_id) == $serviceCategory->id ? 'selected' : '' }}>
                                                                {{ $serviceCategory->name }}
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
