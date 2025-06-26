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
                                    <div class="overflow-auto">
                                        <table class="table text-center table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama UMKM</th>
                                                    <th scope="col">Owner</th>
                                                    <th scope="col">Sektor</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($umkms as $umkm)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $umkm->biodata->business_name ?? '-' }}</td>
                                                        <td>{{ $umkm->user->name }}</td>
                                                        <td>{{ $umkm->sectorCategories->isEmpty() ? '-' : $umkm->sectorCategories->pluck('name')->implode(', ') }}
                                                        </td>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('link-productive.umkms.show', ['umkm' => $umkm->id]) }}"
                                                                class="btn btn-success">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                            @if ($umkm->biodata->id ?? false)
                                                                <a href="{{ route('link-productive.umkms.biodata.edit', ['umkm' => $umkm->id]) }}"
                                                                    class="mx-2 btn btn-warning">
                                                                    <i class="fas fa-edit"></i>
                                                                </a>
                                                            @endif
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
