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
                    Edit data pendaftar umkm
                </p>
                <div class="row">
                    <div class="my-4 col-6">
                        <a href="{{ route('link-productive.service-umkms.index') }}" class="btn btn-primary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto card">
                                    <form
                                        action="{{ route('link-productive.service-umkms.update', ['service_umkm' => $serviceUmkm->id]) }}"
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
                                                    <label for="umkm_id">UMKM</label>
                                                    <input required type="umkm_id" class="form-control" id="umkm_id"
                                                        readonly name="umkm_id"
                                                        value="{{ old('umkm_id', $serviceUmkm->umkm->biodata->business_name ?? '-') }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="user_id">Owner</label>
                                                    <input required type="text" class="form-control" id="user_id"
                                                        readonly placeholder="3500000" name="user_id"
                                                        value="{{ old('user_id', $serviceUmkm->umkm->user->name) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="phone_number">Telepon</label>
                                                    <input required type="text" class="form-control" id="phone_number"
                                                        readonly placeholder="43" name="phone_number"
                                                        value="{{ old('phone_number', $serviceUmkm->umkm->biodata->phone_number ?? '-') }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="service_id">Layanan</label>
                                                    <input required type="number" class="form-control" id="service_id"
                                                        readonly placeholder="43" name="service_id"
                                                        value="{{ old('service_id', $serviceUmkm->service->title) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="register_status">Kategori Layanan</label>
                                                    <select id="register_status" required name="register_status"
                                                        class="form-control">
                                                        <option value="rejected"
                                                            {{ old('register_status', $serviceUmkm->register_status) == 'rejected' ? 'selected' : '' }}>
                                                            Ditolak
                                                        </option>
                                                        <option value="approved"
                                                            {{ old('register_status', $serviceUmkm->register_status) == 'approved' ? 'selected' : '' }}>
                                                            Diterima
                                                        </option>
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
