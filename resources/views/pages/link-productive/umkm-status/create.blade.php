@extends('layouts.app')

@section('title', 'Buat Skala Bisnis')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data status kelas</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Manajemen Bisnis</a></div>
                    <div class="breadcrumb-item"><a href="#">Status Kelas</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data status kelas</h2>
                <p class="section-lead">
                    Buat status kelas
                </p>

                <div class="row">
                    <div class="my-4 col-6">
                        <a href="{{ route('link-productive.umkm-statuses.index') }}" class="btn btn-primary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto card">
                                    <form action="{{ route('link-productive.umkm-statuses.store') }}" method="POST">
                                        @csrf
                                        <div class="card-header">
                                            <h4>Buat Data</h4>
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
                                                    <label for="name">Nama Status Kelas</label>
                                                    <input required type="name" class="form-control" id="name"
                                                        placeholder="Nama Status Kelas..." name="name"
                                                        value="{{ old('name') }}">
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
