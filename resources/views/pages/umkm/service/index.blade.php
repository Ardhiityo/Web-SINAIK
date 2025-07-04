@extends('layouts.app')

@section('title', 'Data Layanan')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pusat Layanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Pusat Layanan</a></div>
                    <div class="breadcrumb-item"><a href="#">Layanan</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Layanan</h2>
                <p class="section-lead">
                    Informasi mengenai semua data layanan
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if ($services->isEmpty())
                                    <p>Belum ada layanan yang tersedia...</p>
                                @else
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <div class="form-group">
                                                <div class="mb-3 input-group">
                                                    <form action="{{ route('umkm.services.index') }}" method="get"
                                                        class="d-flex">
                                                        <input type="text" class="form-control"
                                                            placeholder="Judul layanan..." name="keyword">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="submit">
                                                                <i class="fa-solid fa-magnifying-glass"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="overflow-auto">
                                        <table class="table text-center table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Judul</th>
                                                    <th scope="col">Deskripsi</th>
                                                    <th scope="col">Tanggal Dimulai</th>
                                                    <th scope="col">Tanggal Selesai</th>
                                                    <th scope="col">Kategori</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($services as $service)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ Str::limit($service->title, 15, '...') }}</td>
                                                        <td>{{ Str::limit($service->description, 20, '...') }}</td>
                                                        <td>{{ $service->available_date->translatedFormat('d F Y') }}</td>
                                                        <td>{{ $service->end_date->translatedFormat('d F Y') }}</td>
                                                        <td>{{ Str::limit($service->serviceCategory->name, 15, '...') }}
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('umkm.services.show', ['service' => $service->id]) }}"
                                                                class="btn btn-warning">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
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
                                    {{ $services->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
