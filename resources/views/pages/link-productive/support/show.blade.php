@extends('layouts.app')

@section('title', 'Data Support UMKM')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>UMKM</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Manajemen umkm</a></div>
                    <div class="breadcrumb-item"><a href="#">Dukungan</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data dukungan umkm</h2>
                <p class="section-lead">
                    Informasi mengenai detail dukungan umkm
                </p>
                <div class="row">
                    <div class="my-4 col-6">
                        <a href="{{ route('link-productive.users.index') }}" class="btn btn-primary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header">
                                    <h4>Detail Umkm</h4>
                                </div>
                                <div class="overflow-auto">
                                    <table class="table text-center table-bordered">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th scope="col">Owner</th>
                                                <th scope="col">Nama UMKM</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-nowrap">
                                                <td>{{ $support->umkm->user->name }}</td>
                                                <td>{{ $support->umkm->biodata->phone_number ?? '-' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header">
                                    <h4>Detail Dukungan</h4>
                                </div>
                                <div class="overflow-auto">
                                    <table class="table text-center table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Subject</th>
                                                <th scope="col">Pesan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $support->subject }}</td>
                                                <td>{{ $support->message }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
