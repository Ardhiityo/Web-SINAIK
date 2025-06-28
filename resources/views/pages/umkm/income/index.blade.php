@extends('layouts.app')

@section('title', 'Data Laporan')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pelaporan Bisnis</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Profile Bisnis</a></div>
                    <div class="breadcrumb-item"><a href="#">Pelaporan</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Laporan</h2>
                <p class="section-lead">
                    Informasi mengenai data laporan bisnis
                </p>

                <div class="mt-5 row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>
                                    <a href="{{ route('umkm.incomes.create') }}" class="btn btn-primary">Buat
                                        Laporan</a>
                                </h4>
                            </div>

                            <div class="card-body">
                                @if ($incomes->isEmpty())
                                    <p>Kamu belum memiliki laporan...</p>
                                @else
                                    <div class="overflow-auto">
                                        <table class="table text-center table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Jumlah Pendapatan</th>
                                                    <th scope="col">Jumlah Karyawan</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($incomes as $income)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $income->date->translatedFormat('d F Y') }}</td>
                                                        <td>{{ $income->total_income }}</td>
                                                        <td>{{ $income->total_employee }}</td>
                                                        <td>
                                                            <a href="{{ route('umkm.incomes.edit', ['income' => $income->id]) }}"
                                                                class="btn btn-warning">
                                                                <i class="far fa-edit"></i>
                                                            </a>
                                                            <span class="mx-1"></span>
                                                            <form id="form-delete"
                                                                action="{{ route('umkm.incomes.destroy', ['income' => $income->id]) }}"
                                                                method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" id="btn-delete"
                                                                    class="btn btn-danger">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
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
                                    {{ $incomes->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
