@extends('layouts.admin')

@section('title', 'Administrasi Perpustakaan')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Administrasi Perpustakaan</h1>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card border-start border-primary border-4 shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs fw-bold text-primary text-uppercase mb-1">Total Koleksi</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">{{ number_format($totalBooks) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-start border-success border-4 shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs fw-bold text-success text-uppercase mb-1">Total Eksemplar</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">{{ number_format($totalStock) }}</div>
                        </div>
                        <div class="col-auto">
                             <i class="fas fa-barcode fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-start border-info border-4 shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs fw-bold text-info text-uppercase mb-1">Pengunjung Hari Ini</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">{{ number_format($todayVisitors) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

         <div class="col-md-3">
            <div class="card border-start border-warning border-4 shadow h-100 py-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">
                            <div class="text-xs fw-bold text-warning text-uppercase mb-1">Total Pengunjung</div>
                            <div class="h5 mb-0 fw-bold text-gray-800">{{ number_format($totalVisitors) }}</div>
                        </div>
                        <div class="col-auto">
                             <i class="fas fa-user-friends fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header py-3 bg-white border-0">
                    <div class="text-center mb-2" style="font-size:1.3rem;font-weight:600;">Books by category</div>
                </div>
                <div class="card-body">
                    <canvas id="categoryChart" width="400" height="320"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-primary">Tren Pengunjung Bulanan</h6>
                </div>
                <div class="card-body">
                    <canvas id="visitorChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Pengunjung Terkini -->
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-primary">Pengunjung Terkini</h6>
                </div>
                <div class="card-body">
                    @if($recentVisitors->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Institusi</th>
                                        <th>Tujuan</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($recentVisitors as $visitor)
                                    <tr>
                                        <td><strong>{{ $visitor->name }}</strong></td>
                                        <td>{{ $visitor->institution }}</td>
                                        <td>{{ $visitor->purpose }}</td>
                                        <td>{{ $visitor->visit_date->format('d/m/Y') }}</td>
                                        <td>{{ $visitor->visit_time ? $visitor->visit_time->format('H:i') : '-' }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">Belum ada data pengunjung.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Statistik Institusi -->
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-primary">Top 5 Institusi</h6>
                </div>
                <div class="card-body">
                    @if($institutionStats->count() > 0)
                        <ul class="list-group list-group-flush">
                            @foreach($institutionStats as $institution)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $institution->institution ?: 'Tidak Diketahui' }}
                                <span class="badge bg-primary rounded-pill">{{ $institution->count }}</span>
                            </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-muted">Belum ada data institusi.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
// Category Chart
const categoryCtx = document.getElementById('categoryChart').getContext('2d');
const categoryChart = new Chart(categoryCtx, {
    type: 'doughnut',
    data: {
        labels: @json($categoryChartData['labels']),
        datasets: [{
            data: @json($categoryChartData['data']),
            backgroundColor: @json($categoryChartData['colors']),
            borderWidth: 2,
            borderColor: '#fff'
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
                position: 'bottom',
                align: 'center',
                labels: {
                    usePointStyle: true,
                    padding: 20,
                    font: {
                        size: 14
                    }
                }
            },
            title: {
                display: false
            }
        }
    }
});

// Visitor Chart
const visitorCtx = document.getElementById('visitorChart').getContext('2d');
const visitorChart = new Chart(visitorCtx, {
    type: 'line',
    data: {
        labels: @json($visitorChartData['labels']),
        datasets: [{
            label: 'Jumlah Pengunjung',
            data: @json($visitorChartData['data']),
            borderColor: '#36A2EB',
            backgroundColor: 'rgba(54, 162, 235, 0.1)',
            borderWidth: 3,
            fill: true,
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});
</script>

<style>
.border-start {
    border-left-width: 0.25rem !important;
    border-left-style: solid !important;
}

.card {
    transition: transform 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-5px);
}

.text-xs {
    font-size: 0.7rem;
}

.table th {
    font-weight: 600;
    color: #495057;
}

.table td {
    vertical-align: middle;
}
</style>
@endsection