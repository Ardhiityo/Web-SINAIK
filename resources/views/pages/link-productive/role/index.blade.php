@extends('layouts.app')

@section('title', 'Data UMKM')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Peran</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Manajemen peran</a></div>
                    <div class="breadcrumb-item"><a href="#">Peran</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data peran</h2>
                <p class="section-lead">
                    Informasi mengenai data peran
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>
                                    <a href="{{ route('link-productive.roles.create') }}" class="btn btn-primary">
                                        Buat Peran
                                    </a>
                                </h4>
                            </div>
                            <div class="card-body">
                                @if ($roles->isEmpty())
                                    <p>Belum ada data peran...</p>
                                @else
                                    <div class="overflow-auto">
                                        <table class="table text-center table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Nama</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Peran</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($roles as $role)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $role->name }}</td>
                                                        <td>{{ $role->email }}</td>
                                                        <td>
                                                            @if ($role->roles->pluck('name')->first() === 'admin_lp')
                                                                Admin Link Productive
                                                            @elseif($role->roles->pluck('name')->first() === 'admin_astra')
                                                                Admin Astra
                                                            @elseif($role->roles->pluck('name')->first() === 'admin_ico')
                                                                Admin Diskopukm
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('link-productive.roles.edit', ['role' => $role->id]) }}"
                                                                class="mr-2 btn btn-warning">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <form id="form-delete"
                                                                action="{{ route('link-productive.roles.destroy', ['role' => $role->id]) }}"
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
                                    {{ $roles->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
