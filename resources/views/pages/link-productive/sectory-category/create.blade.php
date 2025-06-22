@extends('layouts.app')

@section('title', 'Buat Sektor Bisnis')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Sektor Bisnis</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Manajemen Bisnis</a></div>
                    <div class="breadcrumb-item"><a href="#">Sektor</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Sektor Bisnis</h2>
                <p class="section-lead">
                    Informasi mengenai data sektor bisnis
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto card">
                                    <form action="{{ route('link-productive.sector-categories.store') }}" method="POST">
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
                                                    <label for="name">Nama Sektor Bisnis</label>
                                                    <input required type="name" class="form-control" id="name"
                                                        placeholder="Nama Sektor..." name="name"
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
