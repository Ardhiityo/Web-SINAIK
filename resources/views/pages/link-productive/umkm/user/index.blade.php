@extends('layouts.app')

@section('title', 'Data UMKM')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Akun umkm</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Informasi umkm</a></div>
                    <div class="breadcrumb-item"><a href="#">Akun</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data akun umkm</h2>
                <p class="section-lead">
                    Informasi mengenai data akun umkm
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a href="{{ route('link-productive.users.create') }}" class="btn btn-primary">
                                        Buat Akun
                                    </a>
                                </h4>
                            </div>
                            <div class="card-body">
                                @if ($users->isEmpty())
                                    <p>Belum ada data umkm...</p>
                                @else
                                    <div class="overflow-auto">
                                        <table class="table text-center table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Owner</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Status Terverifikasi</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $user)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email ?? '-' }}</td>
                                                        <td>
                                                            @if ($user->umkm->is_verified)
                                                                <span class="badge badge-success">Sudah</span>
                                                            @else
                                                                <span class="badge badge-danger">Belum</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('link-productive.users.edit', ['user' => $user->id]) }}"
                                                                class="mr-2 btn btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form id="form-delete"
                                                                action="{{ route('link-productive.users.destroy', ['user' => $user->id]) }}"
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
                                    {{ $users->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
