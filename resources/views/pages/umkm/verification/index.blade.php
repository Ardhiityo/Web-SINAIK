@extends('layouts.app')

@section('title', 'Data Verifikasi')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Verifikasi Bisnis</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Profile Bisnis</a></div>
                    <div class="breadcrumb-item"><a href="#">Verifikasi</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Verifikasi Bisnis</h2>
                <p class="section-lead">
                    Informasi mengenai data status verifikasi bisnismu
                </p>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr class="text-nowrap">
                                                <th scope="col">Status Terverifikasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="text-nowrap">
                                                <td>
                                                    @if (Auth::user()->umkm->is_verified == false)
                                                        <span class="badge badge-danger">Belum</span>
                                                    @else
                                                        <span class="badge badge-success">Sudah</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
