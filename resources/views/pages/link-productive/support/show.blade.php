@extends('layouts.app')

@section('title', 'Edit Produk')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dukungan Umkm</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Profile Bisnis</a></div>
                    <div class="breadcrumb-item"><a href="#">Produk</a></div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Produkmu</h2>
                <p class="section-lead">
                    Informasi mengenai data produkmu bisnismu
                </p>

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="overflow-auto card">
                                    <form action="{{ route('link-productive.supports.store', ['umkm' => $umkm->id]) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="card-header">
                                            <h4>Kirim Dukungan</h4>
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
                                                    <label for="name">Subjek</label>
                                                    <input required type="name" class="form-control" id="name"
                                                        placeholder="Subject..." name="subject">
                                                </div>
                                                <div class="form-group col-12">
                                                    <label for="message">Pesan</label>
                                                    <textarea required class="form-control" id="message" placeholder="Pesan..." name="message"></textarea>
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
