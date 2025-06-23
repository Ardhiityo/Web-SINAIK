@extends('layouts.app')

@section('title', 'Data Sertifikasi')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Sertifikasi</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Manajemen UMKM</a></div>
                    <div class="breadcrumb-item"><a href="#">Sertifikasi</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Sertifikasi</h2>
                <p class="section-lead">
                    Informasi mengenai data sertifikasi UMKM
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
                                @if ($certifications->isEmpty())
                                    <p>Belum ada data umkm...</p>
                                @else
                                    <div class="overflow-auto">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama Sertifikasi</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($certifications as $certification)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $certification->name }}</td>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('link-productive.certifications.edit', ['certification' => $certification->id]) }}"
                                                                class="mr-2 btn btn-warning">
                                                                <i class="far fa-edit"></i>
                                                            </a>
                                                            <form id="form-delete"
                                                                action="{{ route('link-productive.certifications.destroy', ['certification' => $certification->id]) }}"
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
                                    {{ $certifications->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
