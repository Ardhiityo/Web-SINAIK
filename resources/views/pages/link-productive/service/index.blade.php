@extends('layouts.app')

@section('title', 'Data Layanan')

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
                <h2 class="section-title">Layanan</h2>
                <p class="section-lead">
                    Informasi mengenai data layanan
                </p>

                <div class="mt-5 row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>
                                    <a href="{{ route('link-productive.services.create') }}" class="btn btn-primary">
                                        Buat Layanan
                                    </a>
                                </h4>
                            </div>

                            <div class="card-body">
                                @if ($services->isEmpty())
                                    <p>Belum ada layanan...</p>
                                @else
                                    <div class="overflow-auto">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Judul</th>
                                                    <th scope="col">Deskripsi</th>
                                                    <th scope="col">Tanggal Mulai</th>
                                                    <th scope="col">Tanggal Selesai</th>
                                                    <th scope="col">Kategori</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($services as $service)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $service->title }}</td>
                                                        <td>{{ $service->description }}</td>
                                                        <td>{{ $service->available_date }}</td>
                                                        <td>{{ $service->end_date }}</td>
                                                        <td>{{ $service->category->name }}</td>
                                                        <td>
                                                            <a href="{{ route('link-productive.services.edit', ['service' => $service->id]) }}"
                                                                class="btn btn-warning">Edit</a>
                                                            <form id="form-delete"
                                                                action="{{ route('link-productive.services.destroy', ['service' => $service->id]) }}"
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
