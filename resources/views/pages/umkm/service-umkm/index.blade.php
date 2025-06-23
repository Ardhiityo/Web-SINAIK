@extends('layouts.app')

@section('title', 'Data Layanan')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Layanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Pusat Layanan</a></div>
                    <div class="breadcrumb-item"><a href="#">Layananmu</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Layananmu</h2>
                <p class="section-lead">
                    Informasi mengenai semua data layananmu
                </p>

                <div class="mt-5 row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if ($serviceUmkms->isEmpty())
                                    <p>Belum ada layanan yang tersedia...</p>
                                @else
                                    <div class="overflow-auto">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Judul</th>
                                                    <th scope="col">Tanggal Dimulai</th>
                                                    <th scope="col">Tanggal Selesai</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($serviceUmkms as $serviceUmkm)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $serviceUmkm->title }}</td>
                                                        <td>{{ $serviceUmkm->available_date }}</td>
                                                        <td>{{ $serviceUmkm->end_date }}</td>
                                                        <td>
                                                            @if ($serviceUmkm->pivot->register_status == 'process')
                                                                <span class="btn btn-warning">Diproses</span>
                                                            @elseif ($serviceUmkm->pivot->register_status == 'rejected')
                                                                <span class="btn btn-danger">Ditolak</span>
                                                            @elseif ($serviceUmkm->pivot->register_status == 'approved')
                                                                <span class="btn btn-success">Diterima</span>
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
