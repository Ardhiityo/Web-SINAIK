@extends('layouts.app')

@section('title', 'Data Verifikasi')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Informasi Umum</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Informasi Umum</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Tahun Akademik</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Tahun Akademik</h2>
                <p class="section-lead">
                    Semua informasi mengenai data Tahun Akademik yang ada di Fakultas Ilmu Komputer Universitas
                    Al-Khairiyah
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @role('admin')
                                <div class="card-header">
                                    <h4>
                                        <a href="" class="btn btn-primary">Tambah
                                            Data</a>
                                    </h4>
                                </div>
                            @endrole
                            <div class="card-body">
                                {{-- @if ($academicCalendars->isEmpty()) --}}
                                {{-- <p>Data belum tersedia...</p>
                                @else --}}
                                <div class="overflow-auto">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th scope="col">No</th>
                                                <th scope="col">Tahun Mulai</th>
                                                <th scope="col">Tahun Berakhir</th>

                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- @foreach ($academicCalendars as $academicCalendar) --}}
                                            <tr class="text-nowrap">
                                                <th scope="row">1</th>
                                                <td>Yes</td>
                                                <td>yes</td>

                                                <td>
                                                    <a href="" class="btn btn-warning">Edit</a>
                                                    <form id="form-delete" action="" method="POST" class="d-inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" id="btn-delete"
                                                            class="btn btn-danger">Hapus</button>
                                                    </form>
                                                </td>

                                            </tr>
                                            {{-- @endforeach --}}
                                        </tbody>
                                    </table>
                                </div>
                                {{-- @endif --}}
                            </div>
                            <div class="row">
                                <div class="flex-wrap mt-5 col-12 d-flex justify-content-end">
                                    {{-- {{ $academicCalendars->links('pagination::bootstrap-5') }} --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
