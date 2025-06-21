@extends('layouts.app')

@section('title', 'Data Semua Sidang')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Informasi Umum</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Informasi Umum</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Semua Sidang</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Semua Sidang</h2>
                <p class="section-lead">
                    Semua informasi mengenai data Semua Sidang yang ada di Fakultas Ilmu Komputer Universitas
                    Al-Khairiyah
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @if (session()->has('nim_not_found'))
                                <div class="card-header">
                                    <h4>
                                        <p>{{ session('nim_not_found') }}</p>
                                    </h4>
                                </div>
                            @else
                                <div class="card-body">
                                    @if ($councilHubs->isEmpty())
                                        <p>Data belum tersedia...</p>
                                    @else
                                        <div class="row">
                                            <div class="col-12 d-flex justify-content-end">
                                                <div class="form-group">
                                                    <div class="mb-3 input-group">
                                                        <form action="" method="get"
                                                            class="d-flex align-items-center">
                                                            <div class="mx-2 d-flex">
                                                                <select required id="started_date" name="started_date"
                                                                    class="form-control">
                                                                    <option selected value="">Tahun Awal</option>
                                                                    @foreach ($startedAcademicCalendars as $startedAcademicCalendar)
                                                                        <option
                                                                            value="{{ $startedAcademicCalendar->started_date }}"
                                                                            {{ old('started_date') == $startedAcademicCalendar->started_date_year ? 'selected' : '' }}>
                                                                            {{ $startedAcademicCalendar->started_date_year }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                                <select required id="ended_date" name="ended_date"
                                                                    class="form-control">
                                                                    <option selected value="">Tahun Akhir
                                                                    </option>
                                                                    @foreach ($endedAcademicCalendars as $endedAcademicCalendar)
                                                                        <option
                                                                            value="{{ $endedAcademicCalendar->ended_date }}"
                                                                            {{ old('ended_date') == $endedAcademicCalendar->ended_date_year ? 'selected' : '' }}>
                                                                            {{ $endedAcademicCalendar->ended_date_year }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <button class="btn btn-primary" type="submit">
                                                                <i class="fa-solid fa-magnifying-glass"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="overflow-auto">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="text-nowrap">
                                                        <th scope="col">No</th>
                                                        <th scope="col">NIM</th>
                                                        <th scope="col">Mahasiswa</th>
                                                        <th scope="col">Tanggal</th>
                                                        <th scope="col">Waktu</th>
                                                        <th scope="col">Ruangan</th>
                                                        <th scope="col">Pembimbing 1</th>
                                                        <th scope="col">Pembimbing 2</th>
                                                        <th scope="col">Periode</th>
                                                        @role('admin')
                                                            <th scope="col">Penguji 1</th>
                                                            <th scope="col">Penguji 2</th>
                                                            <th scope="col">Ketua Sidang</th>
                                                        @endrole
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($councilHubs as $councilHub)
                                                        <tr class="text-nowrap">
                                                            <th scope="row">{{ $loop->iteration }}</th>
                                                            <td>{{ $councilHub->student->nim }}</td>
                                                            <td>{{ $councilHub->student->name }}</td>
                                                            <td>{{ $councilHub->session_date }}</td>
                                                            <td>{{ $councilHub->session_time }}</td>
                                                            <td>{{ $councilHub->room->name }}</td>
                                                            <td>{{ $councilHub->student->lecture1->name }}</td>
                                                            <td>{{ $councilHub->student->lecture2->name }}</td>
                                                            <td>{{ $councilHub->academicCalendar->periode_year }}</td>
                                                            @role('admin')
                                                                <td>{{ $councilHub->examiner1->name }}</td>
                                                                <td>{{ $councilHub->examiner2->name }}</td>
                                                                <td>{{ $councilHub->moderator->name ?? '-' }}</td>
                                                            @endrole
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    @endif
                                </div>
                            @endif
                            <div class="row">
                                <div class="flex-wrap mt-5 col-12 d-flex justify-content-end">
                                    {{ $councilHubs->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
