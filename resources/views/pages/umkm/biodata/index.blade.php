@extends('layouts.app')

@section('title', 'Data Biodata')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Biodata Bisnis</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Profile Bisnis</a></div>
                    <div class="breadcrumb-item"><a href="#">Biodata</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Dosen</h2>
                <p class="section-lead">
                    Informasi mengenai data biodatamu bisnismu
                </p>

                <div class="mt-5 row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>
                                    <a href="{{ route('umkm.biodata.create') }}" class="btn btn-primary">Buat Biodata</a>
                                </h4>
                            </div>

                            <div class="card-body">
                                @if (is_null($umkm->biodata))
                                    <p>Kamu belum memiliki biodata...</p>
                                @else
                                    <div class="row">
                                        <div class="col-12 d-flex justify-content-end">
                                            <div class="form-group">
                                                <div class="mb-3 input-group">
                                                    <form action="" method="get" class="d-flex">
                                                        <input type="text" class="form-control"
                                                            placeholder="Cari disini..." name="keyword">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="submit">
                                                                <i class="fa-solid fa-magnifying-glass"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="overflow-auto">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">Nama Bisnis</th>
                                                    <th scope="col">Deskripsi Bisnis</th>
                                                    <th scope="col">Skala Bisnis</th>
                                                    <th scope="col">Sertifikasi Bisnis</th>
                                                    <th scope="col">Telepon</th>
                                                    <th scope="col">Tahun Berdiri</th>
                                                    <th scope="col">Kota</th>
                                                    <th scope="col">Provinsi</th>
                                                    <th scope="col">Alamat</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="text-nowrap">
                                                    <td>Arya</td>
                                                    <td>123</td>
                                                    <td>
                                                        <a href="" class="btn btn-warning">Edit</a>
                                                        <form id="form-delete" action="" method="POST"
                                                            class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" id="btn-delete"
                                                                class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
