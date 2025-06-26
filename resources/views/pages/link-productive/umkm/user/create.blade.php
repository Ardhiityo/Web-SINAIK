@extends('layouts.app')

@section('title', 'Buat Akun')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Akun umkm</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Manajemen umkm</a></div>
                    <div class="breadcrumb-item"><a href="#">Akun</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data akun umkm</h2>
                <p class="section-lead">
                    Buat akun umkm
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto card">
                                    <form action="{{ route('link-productive.users.store') }}" method="POST">
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
                                                    <label for="name">Owner</label>
                                                    <input required type="text" class="form-control" id="name"
                                                        placeholder="Masukan owner..." name="name"
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
