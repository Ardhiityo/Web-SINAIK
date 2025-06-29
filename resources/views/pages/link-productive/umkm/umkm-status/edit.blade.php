@extends('layouts.app')

@section('title', 'Edit Laporan Pendapatan')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Laporan Pendapatan Bisnis</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Pelaporan Bisnis</a></div>
                    <div class="breadcrumb-item"><a href="#">Laporan</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Laporanmu</h2>
                <p class="section-lead">
                    Informasi mengenai data laporan bisnismu
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto card">
                                    <form
                                        action="{{ route('link-productive.umkms.umkm-status.update', [
                                            'umkm' => $umkm->id,
                                        ]) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="card-header">
                                            <h4>Edit Data</h4>
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
                                                    <label for="owner">Owner</label>
                                                    <input required type="text" readonly class="form-control"
                                                        id="owner" value="{{ $umkm->user->name }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="umkm">UMKM</label>
                                                    <input required type="text" readonly class="form-control"
                                                        id="umkm" name="umkm"
                                                        value="{{ $umkm->biodata->business_name ?? '-' }}">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="umkm_status_id">Status Kelas</label>
                                                    <select id="umkm_status_id" required name="umkm_status_id"
                                                        class="form-control">
                                                        <option selected value="">Pilih...</option>
                                                        @foreach ($umkmStatatuses as $umkmStatus)
                                                            <option value="{{ $umkmStatus->id }}"
                                                                {{ old('umkm_status_id', $umkm->umkm_status_id) == $umkmStatus->id ? 'selected' : '' }}>
                                                                {{ $umkmStatus->name }}
                                                            </option>
                                                        @endforeach
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
