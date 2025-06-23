@extends('layouts.app')

@section('title', 'Data UMKM')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>UMKM</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Informasi UMKM</a></div>
                    <div class="breadcrumb-item"><a href="#">UMKM</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data UMKM</h2>
                <p class="section-lead">
                    Informasi mengenai performa data UMKM
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if ($performances->isEmpty())
                                    <p>Belum ada data performa umkm...</p>
                                @else
                                    <div class="overflow-auto">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Tanggal</th>
                                                    <th scope="col">Total Pendapatan</th>
                                                    <th scope="col">Total Karyawan</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($performances as $performance)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $performance->date }}</td>
                                                        <td>{{ $performance->total_income }}</td>
                                                        <td>{{ $performance->total_employee }}</td>
                                                        <td>
                                                            <a href="{{ route('link-productive.umkms.performance.edit', ['umkm' => $performance->umkm_id, 'income' => $performance->id]) }}"
                                                                class="mx-2 btn btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form id="form-delete"
                                                                action="{{ route('link-productive.umkms.performance.destroy', ['umkm' => $performance->umkm_id, 'income' => $performance->id]) }}"
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
                                    {{ $performances->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
