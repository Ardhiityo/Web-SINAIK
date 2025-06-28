@extends('layouts.app')

@section('title', 'Data Skala Bisnis')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Skala bisnis</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Manajemen Bisnis</a></div>
                    <div class="breadcrumb-item"><a href="#">Status Kelas</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data status kelas</h2>
                <p class="section-lead">
                    Informasi mengenai data status kelas
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>
                                    <a href="{{ route('link-productive.umkm-statuses.create') }}" class="btn btn-primary">
                                        Buat Status Kelas
                                    </a>
                                </h4>
                            </div>

                            <div class="card-body">
                                @if ($umkmStatuses->isEmpty())
                                    <p>Belum ada status kelas...</p>
                                @else
                                    <div class="overflow-auto">
                                        <table class="table text-center table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Skala Bisnis</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($umkmStatuses as $umkmStatus)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $umkmStatus->name }}</td>
                                                        <td>
                                                            <a href="{{ route('link-productive.umkm-statuses.edit', ['umkm_status' => $umkmStatus->id]) }}"
                                                                class="mr-2 btn btn-warning">
                                                                <i class="far fa-edit"></i>
                                                            </a>
                                                            <form id="form-delete"
                                                                action="{{ route('link-productive.umkm-statuses.destroy', ['umkm_status' => $umkmStatus->id]) }}"
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
                                    {{ $umkmStatuses->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
