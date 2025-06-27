@extends('layouts.app')

@section('title', 'Data UMKM')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dukungan umkm</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Manajemen umkm</a></div>
                    <div class="breadcrumb-item"><a href="#">Dukungan</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data dukungan umkm</h2>
                <p class="section-lead">
                    Informasi mengenai data dukungan umkm
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>
                                    <a href="{{ route('link-productive.supports.create') }}" class="btn btn-primary">
                                        Buat dukungan
                                    </a>
                                </h4>
                            </div>

                            <div class="card-body">
                                @if ($supports->isEmpty())
                                    <p>Belum ada data umkm...</p>
                                @else
                                    <div class="overflow-auto">
                                        <table class="table text-center table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Owner</th>
                                                    <th scope="col">Nama UMKM</th>
                                                    <th scope="col">Subject</th>
                                                    <th scope="col">Pesan</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($supports as $support)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $support->umkm->user->name }}</td>
                                                        <td>{{ $support->umkm->biodata->business_name ?? '-' }}</td>
                                                        <td>{{ Str::limit($support->subject, 5, '...') }}</td>
                                                        <td>{{ Str::limit($support->message, 7, '...') }}</td>
                                                        <td>
                                                            <a href="{{ route('link-productive.supports.show', ['support' => $support->id]) }}"
                                                                class="btn btn-success">
                                                                <i class="far fa-eye"></i>
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
                                    {{ $supports->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
