@extends('layouts.app')

@section('title', 'Data UMKM')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pelaporan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Manajemen umkm</a></div>
                    <div class="breadcrumb-item"><a href="#">Pelaporan</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data pelaporan</h2>
                <p class="section-lead">
                    Informasi mengenai data pelaporan
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form action="{{ route('link-productive.reports.store') }}" method="get">
                                <div class="card-header">
                                    <h4>
                                        Pelaporan
                                    </h4>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="start_date">Dari tanggal</label>
                                            <input required type="date" class="form-control" id="start_date"
                                                name="start_date" value="{{ old('start_date', now()->format('Y-m-d')) }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="end_date">Hingga tanggal</label>
                                            <input required type="date" class="form-control" id="end_date"
                                                name="end_date" value="{{ old('end_date', now()->format('Y-m-d')) }}">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="city">Kota</label>
                                            <select id="city" required name="city" class="form-control">
                                                <option selected value="">Pilih...</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city }}"
                                                        {{ old('city') == $city ? 'selected' : '' }}>
                                                        {{ $city }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="format">Format File</label>
                                            <select id="format" required name="format" class="form-control">
                                                <option selected value="">Pilih...</option>
                                                <option value="pdf" {{ old('format') == 'pdf' ? 'selected' : '' }}>
                                                    pdf
                                                <option value="excel" {{ old('format') == 'excel' ? 'selected' : '' }}>
                                                    excel
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="py-4 col-6">
                                            <button class="btn btn-primary">Download</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
