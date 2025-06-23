@extends('layouts.app')

@section('title', 'Data Skala Bisnis')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Skala Bisnis</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Manajemen Bisnis</a></div>
                    <div class="breadcrumb-item"><a href="#">Skala</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Skala Bisnis</h2>
                <p class="section-lead">
                    Informasi mengenai data skala bisnis
                </p>

                <div class="mt-5 row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-header">
                                <h4>
                                    <a href="{{ route('link-productive.business-scales.create') }}" class="btn btn-primary">
                                        Buat Skala
                                    </a>
                                </h4>
                            </div>

                            <div class="card-body">
                                @if ($businessScales->isEmpty())
                                    <p>Belum ada skala bisnis...</p>
                                @else
                                    <div class="overflow-auto">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-nowrap">
                                                    <th scope="col">No</th>
                                                    <th scope="col">Skala Bisnis</th>
                                                    <th scope="col">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($businessScales as $businessScale)
                                                    <tr class="text-nowrap">
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $businessScale->name }}</td>
                                                        <td>
                                                            <a href="{{ route('link-productive.business-scales.edit', ['business_scale' => $businessScale->id]) }}"
                                                                class="mr-2 btn btn-warning">
                                                                <i class="far fa-edit"></i>
                                                            </a>
                                                            <form id="form-delete"
                                                                action="{{ route('link-productive.business-scales.destroy', ['business_scale' => $businessScale->id]) }}"
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
                                    {{ $businessScales->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
