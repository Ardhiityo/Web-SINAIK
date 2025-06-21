@extends('layouts.app')

@section('title', 'Data Ruangan')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Informasi Umum</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Informasi Umum</a></div>
                    <div class="breadcrumb-item"><a href="#">Data Ruangan</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data Ruangan</h2>
                <p class="section-lead">
                    Semua informasi mengenai data Ruangan yang ada di Fakultas Ilmu Komputer Universitas Al-Khairiyah
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            @role('admin')
                                <div class="card-header">
                                    <h4>
                                        <a href="{{ route('rooms.create') }}" class="btn btn-primary">Tambah Data</a>
                                    </h4>
                                </div>
                            @endrole
                            <div class="card-body">
                                @if ($rooms->isEmpty())
                                    <p>Data belum tersedia...</p>
                                @else
                                    <div class="overflow-auto">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama</th>
                                                    @role('admin')
                                                        <th scope="col">Aksi</th>
                                                    @endrole
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($rooms as $room)
                                                    <tr class="text-nowrap">
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ $room->name }}</td>
                                                        @role('admin')
                                                            <td>
                                                                <a href="{{ route('rooms.edit', ['room' => $room->id]) }}"
                                                                    class="btn btn-warning">Edit</a>
                                                                <form
                                                                    action="{{ route('rooms.destroy', ['room' => $room->id]) }}"
                                                                    method="POST" class="d-inline">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                                </form>
                                                            </td>
                                                        @endrole
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="flex-wrap mt-5 col-12 d-flex justify-content-end">
                                    {{ $rooms->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
