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
                <h2 class="section-title">Data UMKM</h2>
                <p class="section-lead">
                    Informasi mengenai data UMKM
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if ($umkms->isEmpty())
                                    <p>Belum ada data umkm...</p>
                                @else
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <div class="form-group">
                                                <div class="mb-3 input-group">
                                                    <form action="{{ route('link-productive.umkms.index') }}" method="get"
                                                        class="d-flex">
                                                        <select id="category" required name="category"
                                                            class="form-control">
                                                            <option selected value="">Kategori...</option>
                                                            <option value="owner"
                                                                {{ request('category') === 'owner' ? 'selected' : '' }}>
                                                                Owner
                                                            </option>
                                                            <option value="umkm"
                                                                {{ request('category') === 'umkm' ? 'selected' : '' }}>
                                                                Umkm
                                                            </option>
                                                            <option value="umkm_status"
                                                                {{ request('category') === 'umkm_status' ? 'selected' : '' }}>
                                                                Status Kelas
                                                            </option>
                                                            <option value="province"
                                                                {{ request('category') === 'province' ? 'selected' : '' }}>
                                                                Provinsi
                                                            </option>
                                                            <option value="city"
                                                                {{ request('category') === 'city' ? 'selected' : '' }}>
                                                                Kota
                                                            </option>
                                                        </select>
                                                        <input type="text" class="form-control" placeholder="Keyword..."
                                                            name="keyword" value="{{ request('keyword') }}">
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
                                                    <th scope="col">UMKM</th>
                                                    <th scope="col">Owner</th>
                                                    <th scope="col">Status Kelas</th>
                                                    <th scope="col">Biodata</th>
                                                    <th scope="col">Produk</th>
                                                    <th scope="col">Performa</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($umkms as $umkm)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $umkm->biodata->business_name ?? '-' }}</td>
                                                        <td>{{ $umkm->user->name }}</td>
                                                        <td>{{ $umkm->umkmStatus->name ?? '-' }}</td>
                                                        <td>
                                                            <a href="{{ route('link-productive.umkms.show', ['umkm' => $umkm->id]) }}"
                                                                class="btn btn-success">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('link-productive.umkms.product.index', ['umkm' => $umkm->id]) }}"
                                                                class="btn btn-success">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('link-productive.umkms.performance', ['umkm' => $umkm->id]) }}"
                                                                class="btn btn-success">
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
                                    {{ $umkms->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
