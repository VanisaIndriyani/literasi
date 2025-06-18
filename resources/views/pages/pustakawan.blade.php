@extends('layouts.main')

@section('title', 'Pustakawan')

@section('content')
<style>
    .librarian-header {
        background: linear-gradient(rgba(248, 249, 250, 0.9), rgba(248, 249, 250, 0.9)), url('https://via.placeholder.com/1500x500.png?text=Librarian+Background') no-repeat center center;
        background-size: cover;
        padding: 80px 0;
        color: #343a40;
    }

    .librarian-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border-radius: 15px;
    }

    .librarian-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
    }

    .librarian-img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        overflow: hidden;
        border: 4px solid #007bff;
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #f8f9fa;
        margin-bottom: 20px;
    }

    .librarian-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .librarian-img .fas {
        color: #007bff;
        font-size: 3em;
    }

    .social-link {
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 1.1em;
        transition: all 0.3s ease;
    }

    .social-link:hover {
        transform: translateY(-3px);
    }

    .schedule-card {
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .schedule-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
    }

    .bg-light {
        background: linear-gradient(145deg, var(--cream-color), var(--light-brown)) !important;
    }

    .text-muted {
        color: var(--dark-color) !important;
        opacity: 0.8;
    }

    h4, h5 {
        color: var(--dark-color);
    }

    .card {
        border: none !important;
    }

    .contact-card {
        background: linear-gradient(145deg, var(--cream-color), var(--light-brown));
        border-radius: 15px;
        transition: all 0.3s ease;
    }

    .contact-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(139, 69, 19, 0.1);
    }
</style>

<div class="librarian-header mb-5">
    <div class="container">
        <h1 class="text-center display-4 fw-bold mb-4" style="text-shadow: 2px 2px 4px rgba(0,0,0,0.1)">{{ $settings->header_title ?? 'Tim Pustakawan' }}</h1>
        <p class="text-center lead mb-0" style="font-size: 1.25rem; opacity: 0.9">{{ $settings->header_subtitle ?? 'Kenali tim profesional kami yang siap membantu Anda' }}</p>
    </div>
</div>

<div class="container">
    <!-- Team Section -->
    <div class="row g-4 mb-5">
        @foreach($librarians as $librarian)
        <div class="col-md-4">
            <div class="librarian-card card border-0 shadow-sm text-center h-100">
                <div class="card-body p-4">
                    <div class="librarian-img d-flex align-items-center justify-content-center mb-4 mx-auto bg-light">
                        @if($librarian->image)
                            <img src="{{ asset('storage/' . $librarian->image) }}" alt="{{ $librarian->name }}" class="img-fluid rounded-circle" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <i class="fas fa-user-tie fa-3x text-primary"></i>
                        @endif
                    </div>
                    <h4>{{ $librarian->name }}</h4>
                    <p class="text-muted mb-3">{{ $librarian->position }}</p>
                    <p class="small text-muted mb-4">{{ $librarian->description }}</p>
                    <div class="d-flex justify-content-center gap-2">
                        @if($librarian->linkedin)
                        <a href="{{ $librarian->linkedin }}" class="social-link btn btn-outline-primary" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if($librarian->twitter)
                        <a href="{{ $librarian->twitter }}" class="social-link btn btn-outline-info" target="_blank"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if($librarian->email)
                        <a href="mailto:{{ $librarian->email }}" class="social-link btn btn-outline-danger"><i class="fas fa-envelope"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        @if($librarians->isEmpty())
        <div class="col-12">
            <p class="text-center text-muted">Belum ada pustakawan yang ditampilkan.</p>
        </div>
        @endif
    </div>

    <!-- Jadwal Section -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="text-center mb-5">Jadwal Layanan</h2>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="schedule-card card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4"><i class="fas fa-clock text-primary me-2"></i>Jam Operasional</h5>
                            <ul class="list-unstyled">
                                <li class="mb-3">{{ $settings->operational_hours_mf ?? 'Senin - Jumat: 08:00 - 16:00' }}</li>
                                <li class="mb-3">{{ $settings->operational_hours_s ?? 'Sabtu: 09:00 - 14:00' }}</li>
                                <li>{{ $settings->operational_hours_sh ?? 'Minggu & Hari Libur: Tutup' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="schedule-card card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4"><i class="fas fa-calendar-alt text-success me-2"></i>Layanan Khusus</h5>
                            <ul class="list-unstyled">
                                <li class="mb-3">{{ $settings->special_service_consultation ?? 'Konsultasi Penelitian: Senin & Rabu (09:00 - 12:00)' }}</li>
                                <li class="mb-3">{{ $settings->special_service_training ?? 'Pelatihan Literasi: Jumat (13:00 - 15:00)' }}</li>
                                <li>{{ $settings->special_service_guidance ?? 'Bimbingan Pengguna: Setiap hari kerja (dengan perjanjian)' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="text-center mb-5">
        <div class="bg-light p-5 rounded-4 shadow-sm">
            <h3 class="mb-4">{{ $settings->contact_section_title ?? 'Hubungi Pustakawan' }}</h3>
            <p class="text-muted mb-4">{{ $settings->contact_section_subtitle ?? 'Kami siap membantu Anda dengan berbagai kebutuhan informasi' }}</p>
            <div class="row justify-content-center g-3">
                <div class="col-md-4">
                    <a href="tel:{{ $settings->phone ?? '#' }}" class="card text-decoration-none border-0 shadow-sm h-100 schedule-card">
                        <div class="card-body p-4">
                            <i class="fas fa-phone-alt fa-2x text-primary mb-3"></i>
                            <h5>Telepon</h5>
                            <p class="text-muted mb-0">{{ $settings->phone ?? '(021) 1234-5678' }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="mailto:{{ $settings->email ?? '#' }}" class="card text-decoration-none border-0 shadow-sm h-100 schedule-card">
                        <div class="card-body p-4">
                            <i class="fas fa-envelope fa-2x text-success mb-3"></i>
                            <h5>Email</h5>
                            <p class="text-muted mb-0">{{ $settings->email ?? 'pustakawan@perpus.com' }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/' , '' , $settings->whatsapp) ?? '#' }}" class="card text-decoration-none border-0 shadow-sm h-100 schedule-card" target="_blank">
                        <div class="card-body p-4">
                            <i class="fab fa-whatsapp fa-2x text-warning mb-3"></i>
                            <h5>WhatsApp</h5>
                            <p class="text-muted mb-0">{{ $settings->whatsapp ?? '+62 812-3456-7890' }}</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
