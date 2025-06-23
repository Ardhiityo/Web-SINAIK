@extends('layouts.app')

@section('title', 'Data Sektor Bisnis')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kategori Layanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Manajemen Layanan</a></div>
                    <div class="breadcrumb-item"><a href="#">Kategori</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Kategori</h2>
                <p class="section-lead">
                    Informasi mengenai data kategori layanan
                </p>

                <div class="mt-5 row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>
                                    <a href="{{ route('link-productive.service-categories.create') }}"
                                        class="btn btn-primary">
                                        Buat Kategori
                                    </a>
                                </h4>
                            </div>

                            <div class="card-body">
                                @if ($serviceCategories->isEmpty())
                                    <p>Belum ada kategori layanan...</p>
                                @else
                                    <div class="overflow-auto">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Kategori Layanan</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($serviceCategories as $serviceCategory)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $serviceCategory->name }}</td>
                                                        <td>
                                                            <a href="{{ route('link-productive.service-categories.edit', ['service_category' => $serviceCategory->id]) }}"
                                                                class="btn btn-warning">Edit</a>
                                                            <form id="form-delete"
                                                                action="{{ route('link-productive.service-categories.destroy', ['service_category' => $serviceCategory->id]) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" id="btn-delete"
                                                                    class="btn btn-danger">Hapus</button>
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
                                    {{ $serviceCategories->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
