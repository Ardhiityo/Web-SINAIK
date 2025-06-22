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
                            <div class="card-header">
                                <h4>
                                    <a href="{{ route('link-productive.certifications.create') }}" class="btn btn-primary">
                                        Buat Sertifikasi
                                    </a>
                                </h4>
                            </div>
                            <div class="card-body">
                                @if ($umkms->isEmpty())
                                    <p>Belum ada data umkm...</p>
                                @else
                                    <div class="overflow-auto">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama UMKM</th>
                                                    <th scope="col">Owner</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($umkms as $umkm)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $umkm->biodata->business_name }}</td>
                                                        <td>{{ $umkm->user->name }}</td>
                                                        <td>{{ $umkm->biodata->address }}</td>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('link-productive.umkms.show', ['umkm' => $umkm->id]) }}"
                                                                class="btn btn-success">Lihat</a>
                                                            <a href="{{ route('link-productive.umkms.edit', ['umkm' => $umkm->id]) }}"
                                                                class="btn btn-warning">Edit</a>
                                                            <form id="form-delete"
                                                                action="{{ route('link-productive.umkms.destroy', ['umkm' => $umkm->id]) }}"
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
