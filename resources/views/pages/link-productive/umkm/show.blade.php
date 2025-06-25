@extends('layouts.app')

@section('title', 'Data UMKM')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>UMKM</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Informasi UMKM</a></div>
                    <div class="breadcrumb-item"><a href="#">UMKM</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Biodata UMKM</h2>
                <p class="section-lead">
                    Informasi mengenai biodata UMKM
                </p>
                @if ($umkm->biodata->id ?? false)
                    <div class="row">
                        <div class="my-3 col-12 d-flex justify-content-end">
                            <a href="{{ route('link-productive.umkms.product.index', ['umkm' => $umkm->id]) }}"
                                class="mr-2 btn btn-warning">Produk</a>
                            <a href="{{ route('link-productive.umkms.performance', ['umkm' => $umkm->id]) }}"
                                class="btn btn-success">Performa</a>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h4>Owner</h4>
                                    </div>
                                    <div class="overflow-auto">
                                        <table class="table text-center table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">Nama Owner</th>
                                                    <th scope="col">Telepon</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-nowrap">
                                                    <td>{{ $umkm->user->name }}</td>
                                                    <td>{{ $umkm->biodata->phone_number ?? '-' }}</td>
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
                                        <h4>Profil</h4>
                                    </div>
                                    <div class="overflow-auto">
                                        <table class="table text-center table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">Nama UMKM</th>
                                                    <th scope="col">Tahun Berdiri</th>
                                                    <th scope="col">Skala Bisnis</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-nowrap">
                                                    <td>{{ $umkm->biodata->business_name ?? '-' }}</td>
                                                    <td>{{ $umkm->biodata->founding_year ?? '-' }}</td>
                                                    <td>{{ $umkm->biodata->businessScale->name ?? '-' }}</td>
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
                                        <h4>Detail</h4>
                                    </div>
                                    <div class="overflow-auto">
                                        <table class="table text-center table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">Sertifikasi Bisnis</th>
                                                    <th scope="col">Sektor Bisnis</th>
                                                    <th scope="col">Deskripsi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-nowrap">
                                                    <td>{{ $umkm->biodata->certification->name ?? '-' }}</td>
                                                    <td>{{ $umkm->sectorCategories->isEmpty() ? '-' : $umkm->sectorCategories->pluck('name')->implode(', ') }}
                                                    </td>
                                                    <td>{{ $umkm->biodata->business_description ?? '-' }}</td>
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
                                        <h4>Alamat</h4>
                                    </div>
                                    <div class="overflow-auto">
                                        <table class="table text-center table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">Kota</th>
                                                    <th scope="col">Provinsi</th>
                                                    <th scope="col">Alamat lengkap</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-nowrap">
                                                    <td>{{ $umkm->biodata->city ?? '-' }}</td>
                                                    <td>{{ $umkm->biodata->province ?? '-' }}</td>
                                                    <td>{{ $umkm->biodata->address ?? '-' }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a href="{{ route('link-productive.umkms.biodata.create', ['umkm' => $umkm->id]) }}"
                                        class="btn btn-primary">
                                        Buat Biodata
                                    </a>
                                </h4>
                            </div>
                            <div class="card-body">
                                <p>UMKM belum memiliki biodata...</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    </div>
@endsection
