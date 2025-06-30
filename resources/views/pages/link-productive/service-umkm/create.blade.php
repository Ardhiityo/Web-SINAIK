@extends('layouts.app')

@section('title', 'Edit Pendaftaran')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pendaftaran UMKM</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Manajemen Layanan</a></div>
                    <div class="breadcrumb-item"><a href="#">Pendaftar</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data pendaftar</h2>
                <p class="section-lead">
                    Tambah data pendaftar umkm
                </p>
                <div class="row">
                    <div class="my-4 col-6">
                        <a href="{{ route('link-productive.service-umkms.store') }}" class="btn btn-primary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto card">
                                    <form action="{{ route('link-productive.service-umkms.store') }}" method="POST">
                                        @csrf
                                        <div class="card-header">
                                            <h4>Tambah Data</h4>
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
                                                    <label for="umkm_id">UMKM</label>
                                                    <select id="umkm_id" required name="umkm_id" class="form-control">
                                                        @foreach ($umkms as $umkm)
                                                            <option value="{{ $umkm->id }}"
                                                                {{ old('umkm_id') == $umkm->id ? 'selected' : '' }}>
                                                                {{ $umkm->user->name }} -
                                                                {{ $umkm->biodata->business_name ?? '...' }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="service_id">Layanan</label>
                                                    <select id="service_id" required name="service_id" class="form-control">
                                                        @foreach ($services as $service)
                                                            <option value="{{ $service->id }}"
                                                                {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                                                {{ $service->title }}
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
