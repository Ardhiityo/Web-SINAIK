@extends('layouts.app')

@section('title', 'Data Biodata')

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
                <h2 class="section-title">Biodata Bisnis</h2>
                <p class="section-lead">
                    Informasi mengenai biodata bisnis
                </p>
                @if (is_null($biodata))
                    <div class="card">
                        <div class="card-header">
                            <h4>
                                <a href="{{ route('umkm.biodatas.create') }}" class="btn btn-primary">Buat Biodata</a>
                            </h4>
                        </div>
                        <div class="card-body">
                            <p>Belum ada biodata...</p>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="my-3 col-12 d-flex justify-content-end">
                            <a href="{{ route('umkm.biodatas.edit', ['biodata' => $biodata->id]) }}"
                                class="mr-2 btn btn-warning">
                                <i class="far fa-edit"></i>
                            </a>
                            <span class="mx-1"></span>
                            <form action="{{ route('umkm.biodatas.destroy', ['biodata' => $biodata->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header">
                                        <h4>Owner</h4>
                                    </div>
                                    <div class="overflow-auto">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">Nama Owner</th>
                                                    <th scope="col">Telepon</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-nowrap">
                                                    <td>{{ $biodata->umkm->user->name }}</td>
                                                    <td>{{ $biodata->phone_number ?? '-' }}</td>
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
                                                    <td>{{ $biodata->business_name ?? '-' }}</td>
                                                    <td>{{ $biodata->founding_year->translatedFormat('d F Y') ?? '-' }}</td>
                                                    <td>{{ $biodata->businessScale->name ?? '-' }}</td>
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
                                                    <td>{{ $biodata->certification->name ?? '-' }}</td>
                                                    <td>{{ $biodata->umkm->sectorCategories->isEmpty() ? '-' : $biodata->umkm->sectorCategories->pluck('name')->implode(', ') }}
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
                                        <table class="table table-bordered">
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
                @endif
            </div>
        </section>
    </div>
@endsection
