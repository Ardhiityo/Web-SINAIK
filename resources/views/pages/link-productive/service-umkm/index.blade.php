@extends('layouts.app')

@section('title', 'Data Layanan')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pendaftar Layanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Manajemen Layanan</a></div>
                    <div class="breadcrumb-item"><a href="#">Pendaftar</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Pendaftar</h2>
                <p class="section-lead">
                    Informasi mengenai semua data pendaftar layanan
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if ($serviceUmkms->isEmpty())
                                    <p>Belum ada pendaftar layanan...</p>
                                @else
                                    <div class="overflow-auto">
                                        <table class="table text-center table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">No</th>
                                                    <th scope="col">UMKM</th>
                                                    <th scope="col">Owner</th>
                                                    <th scope="col">Telepon</th>
                                                    <th scope="col">Layanan</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($serviceUmkms as $serviceUmkm)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $serviceUmkm->umkm->biodata->business_name ?? '-' }}</td>
                                                        <td>{{ $serviceUmkm->umkm->user->name }}</td>
                                                        <td>{{ $serviceUmkm->umkm->biodata->phone_number ?? '-' }}</td>
                                                        <td>{{ $serviceUmkm->service->title }}</td>
                                                        <td>
                                                            @if ($serviceUmkm->register_status == 'process')
                                                                Diproses
                                                            @elseif ($serviceUmkm->register_status == 'rejected')
                                                                Ditolak
                                                            @elseif ($serviceUmkm->register_status == 'approved')
                                                                Diterima
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('link-productive.service-umkms.edit', ['service_umkm' => $serviceUmkm->id]) }}"
                                                                class="mr-2 btn btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form id="form-delete"
                                                                action="{{ route('link-productive.service-umkms.destroy', ['service_umkm' => $serviceUmkm->id]) }}"
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
                                    {{ $serviceUmkms->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
