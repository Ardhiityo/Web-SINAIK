@extends('layouts.app')

@section('title', 'Buat Akun')

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
                <h2 class="section-title">Data akun peran</h2>
                <p class="section-lead">
                    Buat peran
                </p>
                <div class="row">
                    <div class="my-4 col-6">
                        <a href="{{ route('link-productive.roles.index') }}" class="btn btn-primary">
                            Kembali
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto card">
                                    <form action="{{ route('link-productive.roles.store') }}" method="POST">
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
                                                    <label for="name">Nama</label>
                                                    <input required type="text" class="form-control" id="name"
                                                        placeholder="Masukan nama..." name="name"
                                                        value="{{ old('name') }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="email">Email</label>
                                                    <input required type="text" class="form-control" id="email"
                                                        placeholder="Masukan email..." name="email"
                                                        value="{{ old('email') }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="password">Password</label>
                                                    <input required type="password" class="form-control" id="password"
                                                        placeholder="Masukan password..." name="password"
                                                        value="{{ old('password') }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="role">Peran</label>
                                                    <select id="role" required name="role" class="form-control">
                                                        <option value="admin_astra"
                                                            {{ old('role') === 'admin_astra' ? 'selected' : '' }}>
                                                            Admin Astra
                                                        </option>
                                                        <option value="admin_ico"
                                                            {{ old('role') === 'admin_ico' ? 'selected' : '' }}>
                                                            Admin Diskopukm
                                                        </option>
                                                    </select>
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
