@extends('layouts.app')

@section('title', 'Edit Sertifikasi')

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
                <h2 class="section-title">Data sertifikasi</h2>
                <p class="section-lead">
                    Edit sertifikasi umkm
                </p>

                <div class="row">
                    <div class="my-4 col-6">
                        <a href="{{ route('link-productive.certifications.index') }}" class="btn btn-primary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto">
                                    <form action="{{ route('link-productive.certifications.update', $certification) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-header">
                                            <h4>Edit Data</h4>
                                        </div>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="card-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="name">Nama Sertifikasi</label>
                                                    <input required type="name" class="form-control" id="name"
                                                        placeholder="Nama Sertifikasi..." name="name"
                                                        value="{{ old('name', $certification->name) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
