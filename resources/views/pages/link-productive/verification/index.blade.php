@extends('layouts.app')

@section('title', 'Data Verifikasi')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Verifikasi umkm</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Manajemen umkm</a></div>
                    <div class="breadcrumb-item"><a href="#">Verifikasi</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data verifikasi akun umkm</h2>
                <p class="section-lead">
                    Informasi mengenai data status verifikasi akun umkm
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
                                                    <th scope="col">Status Terverifikasi</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($umkms as $umkm)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $umkm->biodata->business_name ?? '-' }}</td>
                                                        <td>{{ $umkm->user->name }}</td>
                                                        <td>
                                                            @if ($umkm->is_verified)
                                                                <span class="badge badge-success">Sudah</span>
                                                            @else
                                                                <span class="badge badge-danger">Belum</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($umkm->is_verified)
                                                                <form
                                                                    action="{{ route('link-productive.verifications.update', ['verification' => $umkm->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Unverifikasi</button>
                                                                </form>
                                                            @else
                                                                <form
                                                                    action="{{ route('link-productive.verifications.update', ['verification' => $umkm->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('put')
                                                                    <button type="submit"
                                                                        class="btn btn-warning">Verifikasi</button>
                                                                </form>
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
