@extends('layouts.app')

@section('title', 'Edit Kategori Layanan')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Kategori Layanan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Manajemen Layanan</a></div>
                    <div class="breadcrumb-item"><a href="#">Kategori Layanan</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Kategori Layanan</h2>
                <p class="section-lead">
                    Informasi mengenai data kategori layanan
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto card">
                                    <form
                                        action="{{ route('link-productive.service-categories.update', ['service_category' => $serviceCategory->id]) }}"
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
                                                    <label for="name">Nama Kategori Layanan</label>
                                                    <input required type="name" class="form-control" id="name"
                                                        placeholder="Nama Kategori Layanan..." name="name"
                                                        value="{{ old('name', $serviceCategory->name) }}">
                                                </div>
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
