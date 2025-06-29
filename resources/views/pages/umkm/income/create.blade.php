@extends('layouts.app')

@section('title', 'Buat Laporan Pendapatan')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Laporan Pendapatan Bisnis</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Pelaporan Bisnis</a></div>
                    <div class="breadcrumb-item"><a href="#">Laporan</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Laporanmu</h2>
                <p class="section-lead">
                    Informasi mengenai data laporan bisnismu
                </p>
                <div class="row">
                    <div class="my-4 col-6">
                        <a href="{{ route('umkm.incomes.index') }}" class="btn btn-primary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto card">
                                    <form action="{{ route('umkm.incomes.store') }}" method="POST">
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
                                                    <label for="date">Tanggal</label>
                                                    <input required type="date" class="form-control" id="date"
                                                        name="date" value="{{ old('date') }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="total_income">Total Pendapatan</label>
                                                    <input required type="number" class="form-control" id="total_income"
                                                        placeholder="3500000" name="total_income"
                                                        value="{{ old('total_income') }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="total_employee">Total Karyawan</label>
                                                    <input required type="number" class="form-control" id="total_employee"
                                                        placeholder="43" name="total_employee"
                                                        value="{{ old('total_employee') }}">
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
