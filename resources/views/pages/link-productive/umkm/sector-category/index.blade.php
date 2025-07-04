@extends('layouts.app')

@section('title', 'Data Produk')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Sektor Bisnis</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Profile Bisnis</a></div>
                    <div class="breadcrumb-item"><a href="#">Sektor</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Sektor Bisnis</h2>
                <p class="section-lead">
                    Informasi mengenai data sektor bisnis
                </p>

                <div class="mt-5 row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>
                                    <a href="{{ route('link-productive.umkms.sector-category-umkm.create', ['umkm' => $umkm->id]) }}"
                                        class="btn btn-primary">
                                        Buat Sektor Bisnis
                                    </a>
                                </h4>
                            </div>

                            <div class="card-body">
                                @if ($sectorCategories->isEmpty())
                                    <p>Kamu belum memiliki sektor kategori...</p>
                                @else
                                    <div class="overflow-auto">
                                        <table class="table text-center table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Sektor Kategori</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($sectorCategories as $sectorCategory)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $sectorCategory->name }}</td>
                                                        <td>
                                                            <a href="{{ route('link-productive.umkms.sector-category-umkm.edit', [
                                                                'umkm' => $sectorCategory->pivot->umkm_id,
                                                                'sector_category_umkm' => $sectorCategory->pivot->id,
                                                            ]) }}"
                                                                class="btn btn-warning">
                                                                <i class="far fa-edit"></i>
                                                            </a>
                                                            <span class="mx-1"></span>
                                                            <form id="form-delete"
                                                                action="{{ route('link-productive.umkms.sector-category-umkm.destroy', [
                                                                    'umkm' => $sectorCategory->pivot->umkm_id,
                                                                    'sector_category_umkm' => $sectorCategory->pivot->id,
                                                                ]) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" id="btn-delete"
                                                                    class="btn btn-danger">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
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
                                    {{ $sectorCategories->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
