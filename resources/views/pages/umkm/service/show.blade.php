@extends('layouts.app')

@section('title', 'Data Layanan')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Layanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Layanan</a></div>
                    <div class="breadcrumb-item"><a href="#">Layanan</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Layanan</h2>
                <p class="section-lead">
                    Informasi mengenai data layanan {{ $service->title }}, dengan
                    kategori {{ $service->serviceCategory->name }}
                </p>

                <div class="mt-5 row">
                    <div class="mb-4 col-12 d-flex justify-content-between">
                        <a href="{{ route('umkm.services.index') }}" class="btn btn-primary">
                            Kembali
                        </a>
                        @if (!$registeredServiceCheck)
                            <form action="{{ route('umkm.services.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="service_id" value="{{ $service->id }}">
                                <button class="btn btn-success">Daftar</button>
                            </form>
                        @endif
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header">
                                    <h4>
                                        {{ $service->title }}
                                    </h4>
                                </div>
                                <div class="overflow-auto">
                                    <table class="table text-center table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Deskripsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $service->description }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header">
                                    <h4>
                                        Tanggal
                                    </h4>
                                </div>
                                <div class="overflow-auto">
                                    <table class="table text-center table-bordered">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th scope="col">Dimulai</th>
                                                <th scope="col">Selesai</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-nowrap">
                                                <td>{{ $service->available_date }}</td>
                                                <td>{{ $service->end_date }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
