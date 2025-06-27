@extends('layouts.app')

@section('title', 'General Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Dashboard</h1>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-primary">
                                <i class="far fa-user"></i>

                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Layanan</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalService }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-success">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Karyawan</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalEmployee }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-warning">
                                <i class="far fa-building"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Pendapatan</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalIncome }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="">
                        <div class="card card-statistic-1">
                            <div class="card-icon bg-info">
                                <i class="fas fa-calendar-days"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>Total Sektor</h4>
                                </div>
                                <div class="card-body">
                                    {{ $totalSector }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Statistics</h4>
                            <div class="card-header-action">
                                <span class="btn btn-primary">Performa</span>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Layanan terbaru</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-unstyled list-unstyled-border">
                                @foreach ($services as $service)
                                    <a href="" class="mb-4 text-decoration-none media">
                                        <img class="mr-3 rounded-circle" width="50"
                                            src="{{ asset('img/avatar/avatar-1.png') }}" alt="avatar">
                                        <div class="media-body">
                                            <div class="float-right text-primary">
                                                {{ Carbon\Carbon::parse($service->created_at)->diffForHumans() }}
                                            </div>
                                            <div class="media-title">
                                                {{ Str::limit(ucfirst(strtolower($service->title)), 15, '...') }}
                                            </div>
                                            <span class="text-small text-muted">
                                                {{ Str::limit(ucfirst(strtolower($service->description)), 25, '...') }}
                                            </span>
                                        </div>
                                    </a>
                                @endforeach
                            </ul>
                            <div class="pt-1 pb-1 text-center">
                                <a href="{{ route('umkm.services.index') }}" class="btn btn-primary btn-lg btn-round">
                                    Semua layanan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');

        // Labels (sumbu X)
        var dates = @json($dates);

        // Dataset pertama (misal: jumlah proposal)
        var incomes = @json($incomes);

        // Dataset kedua (misal: pendapatan)
        var employees = @json($employees);

        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: dates,
                datasets: [{
                        label: 'Total Karyawan',
                        data: employees,
                        borderWidth: 3,
                        borderColor: '#6777ef',
                        backgroundColor: 'transparent',
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#6777ef',
                        pointRadius: 4
                    },
                    {
                        label: 'Total Pendapatan',
                        data: incomes,
                        borderWidth: 3,
                        borderColor: '#28a745',
                        backgroundColor: 'transparent',
                        pointBackgroundColor: '#fff',
                        pointBorderColor: '#28a745',
                        pointRadius: 4
                    }
                ]
            },
            options: {
                legend: {
                    display: true,
                    labels: {
                        boxWidth: 12
                    }
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            stepSize: 500000
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            color: '#fbfbfb',
                            lineWidth: 2
                        }
                    }]
                },
                tooltips: {
                    mode: 'index',
                    intersect: false
                },
                responsive: true,
                maintainAspectRatio: false
            }
        });
    </script>
@endpush
