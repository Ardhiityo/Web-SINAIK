@extends('layouts.app')

@section('title', 'Disposisi Surat')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Informasi {{ $person->category === 'dean_of_faculty' ? 'Dekan' : 'Wakil Rektor I' }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Disposisi Surat</a></div>
                    <div class="breadcrumb-item"><a
                            href="#">{{ $person->category === 'dean_of_faculty' ? 'Dekan' : 'Wakil Rektor I' }}</a>
                    </div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Data {{ $person->category === 'dean_of_faculty' ? 'Dekan' : 'Wakil Rektor I' }}
                </h2>
                <p class="section-lead">
                    Informasi mengenai data {{ $person->category === 'dean_of_faculty' ? 'Dekan' : 'Wakil Rektor I' }} yang
                    ada di Universitas Al-Khairiyah
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto card">
                                    <form action="{{ route('dispositions.update', ['disposition' => $person->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-header">
                                            <h4>Detail Informasi</h4>
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
                                                    <label for="name">Nama Dekan</label>
                                                    <input required type="name" class="form-control" id="name"
                                                        placeholder="Nama lengkap & gelar" name="name"
                                                        @role('visitor') {{ 'readonly' }} @endrole
                                                        value="{{ old('name', $person->name) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="nidn">NIDN</label>
                                                    <input type="text" name="nidn" required class="form-control"
                                                        id="nidn" placeholder="10 digit..."
                                                        @role('visitor') {{ 'readonly' }} @endrole
                                                        value="{{ old('nidn', $person->nidn) }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="position">Jabatan</label>
                                                    <input type="text"
                                                        {{ $person->category === 'dean_of_faculty' ? 'readonly' : '' }}
                                                        name="position" required class="form-control" id="position"
                                                        @role('visitor') {{ 'readonly' }} @endrole
                                                        placeholder="Dekan Fakultas Ilmu Komputer"
                                                        value="{{ old('position', $person->position) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            @role('admin')
                                                <button class="btn btn-primary">Submit</button>
                                            @endrole
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
